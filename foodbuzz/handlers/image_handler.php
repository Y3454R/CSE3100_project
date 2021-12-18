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

$review_id = $_GET['review_id'];

$review_image = "";

if(isset($_POST['upload']) && isset($_FILES['review_image'])) {

    echo "<pre>";print_r($_FILES['review_image']);echo"</pre>";
    $img_name = $_FILES['review_image']['name'];
    $img_size = $_FILES['review_image']['size'];
    $tmp_name = $_FILES['review_image']['tmp_name'];
    $error = $_FILES['review_image']['error'];

    if($error === 0){ 
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if(in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("REVIMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        }
        else {
            $er_msg = "unknown extension";
            header("Location: review_image.php?error=$er_msg");
        }
    }
    else {
        $er_msg = "unknown error occurred!";
        header("Location: review_image.php?error=$er_msg");
    }

    // review er info array
    $review_details_query = mysqli_query($con, "SELECT * FROM review WHERE review_id='$review_id'");
    $review_row = mysqli_fetch_array($review_details_query);
    $old_image = 'uploads/'.$review_row['img_url'];
    unlink($old_image);

    $review_image = $new_img_name;

    $sql ="UPDATE review SET img_url='$review_image' WHERE review_id='$review_id'";

    mysqli_query($con, $sql);

    header("Location: full_review.php?review_id=$review_id");

}


?>