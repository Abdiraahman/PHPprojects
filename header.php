<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php login system</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    if(isset($_SESSION["usersuid"])){
                        echo"<li><a href='signup.php'>Sign Up</a><li>";
                        echo"<li><a href='login.php'>Log in</a></li>";
                    }
                    else{
                        echo"<li><a href='signup.php'>Sign up</a></li>";
                        echo"<li><a href='login.php'>Log in</a></li>";

                    }
                    
                ?>
            </ul>
        </nav>
    </header>
