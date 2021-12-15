<?php

require 'config/config.php';
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: index.php");
}

$dp_image = "";

if(isset($_POST['upload']) && isset($_FILES['dp_image'])) {

    /* image */
    
    // echo "<pre>";
    // print_r($_FILES['dp_image']);
    // echo "</pre>";

    $img_name = $_FILES['dp_image']['name'];
    $img_size = $_FILES['dp_image']['size'];
    $tmp_name = $_FILES['dp_image']['tmp_name'];
    $error = $_FILES['dp_image']['error'];

    if($error === 0){
        
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if(in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("DPIMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'image/dp/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        }
        else {
            $er_msg = "unknown extension";
            header("Location: profile.php?error=$er_msg");
        }
    }
    else {
        $er_msg = "unknown error occurred!";
        header("Location: profile.php?error=$er_msg");
    }

    /* image ends */

    $dp_image = "image/dp/".$new_img_name;
    echo $dp_image;

    // alter image value of user table
    $user_id = $user['id'];
    $sql ="UPDATE users SET profile_pic='$dp_image' WHERE id=$user_id";

    mysqli_query($con, $sql);
    header("Location: profile.php?profileId=$user_id");

}


?>