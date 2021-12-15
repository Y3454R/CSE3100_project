<?php

//Declaring variable to prevent errors
$fname = ""; //first name
$lname = ""; //last name
$dist = ""; //area
$em = ""; //email
$password = ""; //password
$password2 = ""; //password2
$date = ""; //sign up date
$error_array = array(); //holds errror messages

if(isset($_POST['register_button'])) {

    //registration form values

    //first name
    $fname = strip_tags($_POST['reg_fname']); //strip tags for sequrity purposes - remove html tags
    $fname = str_replace(' ','', $fname); //remove spaces
    $fname = ucfirst(strtolower($fname)); //Upper case first letter
    $_SESSION['reg_fname'] = $fname;

    //last name
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','', $lname); 
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    //district
    $dist = strip_tags($_POST['reg_dist']);
    $dist = str_replace(' ', '', $dist);
    $dist = ucfirst(strtolower($dist));
    $_SESSION['reg_dist'] = $dist;
   
    //email
    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ','', $em); 
    //$em = ucfirst(strtolower($em)); //is this right? I remove it
    $_SESSION['reg_email'] = $em;

    //password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    $date = date("Y-m-d"); //Current date


    //check if district is valid

    if(preg_match('/[^A-Za-z0-9]/',$dist)) {
        array_push($error_array, "District can only contain English characters!<br>");
    }

    //check if email is in valid format
    if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $em = filter_var($em, FILTER_VALIDATE_EMAIL);

        //check if email exist
        $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
        //count the number of rows returned
        $num_rows = mysqli_num_rows($e_check);
        if($num_rows > 0) {
            array_push($error_array, "Email already in use!<br>");
        }
    }
    else {
        array_push($error_array, "Invalid email format!<br>");
    }


    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "First name must be between 2 and 25 characters!<br>");

    }
    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Last name must be between 2 and 25 characters!<br>");
    }
    
    if($password != $password2) {
        array_push($error_array, "Your passwords do not match!<br>");
    }
    else {
        if(preg_match('/[^A-Za-z0-9]/',$password)) { // confusion: shouldn't it be !preg here?
            array_push($error_array, "Your password can only contain English characters or numbers!<br>");
        }
    }

    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array, "Your password must be between 5 and 30 characters!<br>");
    }

    if(empty($error_array)) {
        $password = md5($password); //Encrypt password before sending to database

        //Generate username by concatenating first name & last name
        $username = strtolower($fname."_".$lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        
        $i = 0;
        //if username exists add number to username
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username."_".$i; //edit needed, I think
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }

        $profile_pic = "image/dp/user_dp.jpg";

        $list_count = 0;

        $query = mysqli_query($con, "INSERT INTO users VALUES('','$fname','$lname','$username','$em', '$password', '$date', '$profile_pic', '$dist','$list_count')");
        
        array_push($error_array, "<span style='color:#14C800;' >You're all set! Go ahead and login!</span><br>");

        //clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_dist'] = "";
        $_SESSION['reg_email'] = "";
        
    }
}

?>