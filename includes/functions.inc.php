<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    return empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat);
}

function invalidUid($username){
    return !preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function invalidEmail($email){
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pwdMatch($pwd, $pwdrepeat){
    return $pwd !== $pwdrepeat;
}

function uidExists($conn, $username, $email){
    $sql ="SELECT * FROM users WHERE usersUid = ? OR usersEmail= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        mysqli_stmt_close($stmt);

        return $result;
    }

}

function createUser($conn, $name, $email, $username, $pwd){
    $sql ="INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    return empty($username) || empty($pwd);
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if (!$uidExists) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if (!$checkPwd) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["usersuid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}