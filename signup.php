<?php 
    include_once 'header.php';
?>
    <section>
    <div class="main-container">

        <div class="form-container">

            <div class="form-body">
                <h2>Sign Up</h2>

                <form action="includes/signup.inc.php" method="post" class="the-form" >
                    <label>Name:</label>
                    <input type="text" name="name" placeholder="Full name...">
                    <label>Email:</label>
                    <input type="text" name="email" placeholder="email...">
                    <label>Username:</label>
                    <input type="text" name="uid" placeholder="Username...">
                    <label>Password:</label>
                    <input type="password" name="pwd" placeholder="Password...">
                   <label>Repeat password:</label>
                    <input type="password" name="pwdrepeat" placeholder="repeat password...">

                    <button type="submit" name="submit" >Sign Up</button>
                </form>

            </div>
        </div>
    </div>

           <?php
        if(isset($_GET["ERROR"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invaliduid"){
            echo "<p>choose a proper username!</p>";

        }
        
        else if($_GET["error"] == "invalidemail"){
            echo "<p>choose a proper email!</p>";

        }
        else if($email_GET["error"] == "passwordsdontmatch"){
            echo "<p>passwords doesn't match!</p>";

        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>something went wrong, try again!</p>";

        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Username already taken!</p>";

        }
        else if($_GET["error"] == "none"){
            echo "<p>You have signed up!</p>";

        }
    }
        
        ?>
        </section>


<?php 
    include_once 'footer.php';
?>