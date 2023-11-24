<?php 
    include_once 'header.php';
?>
        <div class="main-container">

            <div class="form-container">

                <div class="form-body">

                    <h2 class="title">Log In</h2>

                    <form action="includes/login.inc.php" method="post" class="the-form" >
                            <label>Email/username:</label>
                            <input type="text" name="uid" placeholder="username/email..."><br>
                            <label>Password:</label>
                            <input type="password" name="pwd" placeholder="Password...">
                            <button type="submit" name="submit" >Log In</button>
                    </form>
                </div>
                <div class="form-footer" >
                    <div>
                         <span>Don't have an account?</span> <a href="signup.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>

           <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all the fields!</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo "<p>incorrect login information!</p>";

            }
            
        }
        
        ?>

        </section>

<?php 
    include_once 'footer.php';
?>