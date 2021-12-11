<?php

require 'config/config.php';
require 'handlers/register_handler.php';
require 'handlers/login_handler.php';

?>

<html>

<head>
    <title>Food Buzz</title>
    <link rel ="stylesheet" type="text/css" href="css/indexStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="script/indexScript.js"></script>
</head>

<body>

<?php

if(isset($_POST['register_button'])) {
    echo '
    <script>
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
    </script>
    ';
}

?>

<div class = "wrapper">
    
    <div class = "login_box">

        <div class = "login_header">
            <h1>Food Buzz</h1>
            <pre style="font-size:14px;">Decide Where to Eat Today.</pre>
        </div>

        <div id="first">
        
            <form action="index.php" method="POST">

                <input type="email" name="log_email" placeholder="Email"
                value="<?php
                if(isset($_SESSION['log_email'])) {
                    echo $_SESSION['log_email'];
                    }
                ?>" required>
                <br>
                <input type="password" name="log_password" placeholder="Password">
                <br>
                <input type="submit" name="login_button" value="login">
                <br>

                <?php
                    if(in_array("Email or password is incorrect!<br>", $error_array)) echo "Email or password is incorrect!<br>"
                ?>

                <a href="#" id="signup" class ="signup">Join Food Buzz</a>

            </form>
        
        </div>


        <div id="second">

            <form action="index.php" method="POST">
                <!-- first name -->
                <input type="text" name="reg_fname" placeholder="First Name"
                value="<?php
                if(isset($_SESSION['reg_fname'])) {
                    echo $_SESSION['reg_fname'];
                    }
                ?>" required>
                <br>
                <?php if(in_array("First name must be between 2 and 25 characters!<br>", $error_array))
                    echo "First name must be between 2 and 25 characters!<br>" ?>

                <!-- last name -->
                <input type="text" name="reg_lname" placeholder="Last Name"
                value="<?php
                if(isset($_SESSION['reg_lname'])) {
                    echo $_SESSION['reg_lname'];
                    }
                ?>" required>
                <br>
                <?php if(in_array("Last name must be between 2 and 25 characters!<br>", $error_array))
                    echo "Last name must be between 2 and 25 characters!<br>" ?>

                <!-- District -->
                <input type="text" name="reg_dist" placeholder="District"
                value="<?php
                if(isset($_SESSION['reg_dist'])) {
                    echo $_SESSION['reg_dist'];
                    }
                ?>" required>
                <br>
                <?php if(in_array("District can only contain English characters!<br>", $error_array))
                    echo "District can only contain English characters!<br>" ?>

                <!-- email -->
                <input type="email" name="reg_email" placeholder="Email"
                value="<?php
                if(isset($_SESSION['reg_email'])) {
                    echo $_SESSION['reg_email'];
                    }
                ?>" required>
                <br>

                <?php if(in_array("Email already in use!<br>", $error_array))
                    echo "Email already in use!<br>" ?>
                <?php if(in_array("Invalid email format!<br>", $error_array))
                    echo "Invalid email format!<br>" ?>
                <?php if(in_array("Emails don't match!<br>", $error_array))
                    echo "Emails don't match!<br>" ?>

                <!-- password -->
                <input type="password" name="reg_password" placeholder="Password" required>
                <br>
                <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                <br>
                <?php if(in_array("Your password can only contain English characters or numbers!<br>", $error_array))
                    echo "Your password can only contain English characters or numbers!<br>" ?>
                <?php if(in_array("Your password must be between 5 and 30 characters!<br>", $error_array))
                    echo "Your password must be between 5 and 30 characters!<br>" ?>
                <?php if(in_array("Your passwords do not match!<br>", $error_array))
                    echo "Your passwords do not match!<br>" ?>

                <input type="submit" name="register_button" value="Register">
                <br>

                <?php if(in_array("<span style='color:#14C800;' >You're all set! Go ahead and login!</span><br>", $error_array))
                    echo "<span style='color:#14C800;' >You're all set! Go ahead and login!</span><br>" ?>

                <a href="#" id="signin" class ="signin">Login</a>

            </form>  
                
        </div>


    </div>

</div>

</body>


</html>