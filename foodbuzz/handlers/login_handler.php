<?php

if(isset($_POST['login_button'])) {

    $email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL); // sanitize email
    $_SESSION['log_email'] = $email; // store email into session variable
    $password = md5($_POST['log_password']); // get password

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);
    
    if($check_login_query == 1) {
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username; //new session variable
        if(!empty($_POST["remember"])) {
            setcookie ("email",$_POST["log_email"],time()+ 3600);
            setcookie ("password",$_POST["log_password"],time()+ 3600);
            // echo "Cookies Set Successfuly";
        }
        header("Location: home.php");
        exit();
    }
    else {
        array_push($error_array, "Email or password is incorrect!<br>");
    }

}


?>