<?php

if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    $pwdRepeat = filter_input(INPUT_POST, 'pwdrepeat', FILTER_SANITIZE_STRING);

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)) {
        header("location:../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username)) {
        header("location:../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email)) {
        header("location:../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat)) {
        header("location:../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email)) {
        header("location:../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
} else {
    header("location:../signup.php");
    exit();
}

