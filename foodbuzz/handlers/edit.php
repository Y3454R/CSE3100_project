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

$user_id = $user['id'];

$review_id = $_GET['review_id'];

// review er info array
$review_details_query = mysqli_query($con, "SELECT * FROM review WHERE review_id='$review_id'");
$review_row = mysqli_fetch_array($review_details_query);

// echo "<pre>";print_r($review_row);echo"</pre>";

// reviewer er info array
$profile_id = $review_row['user_id'];
$profile_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$profile_id'");
$profile_row = mysqli_fetch_array($profile_details_query);

// variable keeping data from review form and to update in review table
$item_name = "";
$res_name = "";
$district_name = "";
$rating_point = "";
$price = "";
$meal_type = "";
$cuisine_type = "";
$review_text = "";
$review_time = "";

// if(isset($_POST['edit_review']) && isset($_POST['review_image'])) {
if(isset($_POST['edit_review'])) {

    //echo "TEST<br>";

    // $img_name = $_FILES['review_image']['name'];
    // $img_size = $_FILES['review_image']['size'];
    // $tmp_name = $_FILES['review_image']['tmp_name'];
    // $error = $_FILES['review_image']['error'];

    // echo "<pre>";print_r($_FILES['review_image']);echo"</pre>";

    // if(!empty($img_name)) {
    //     if($error === 0){
        
    //         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    //         $img_ex_lc = strtolower($img_ex);
    
    //         $allowed_exs = array("jpg", "jpeg", "png");
    //         if(in_array($img_ex_lc, $allowed_exs)) {
    //             $new_img_name = uniqid("REVIMG-",true).'.'.$img_ex_lc;
    //             $img_upload_path = 'uploads/'.$new_img_name;
    //             move_uploaded_file($tmp_name, $img_upload_path);
    //         }
    //         else {
    //             $er_msg = "unknown extension";
    //             header("Location: addreview.php?error=$er_msg");
    //         }
    //     }
    //     else {
    //         $er_msg = "unknown error occurred!";
    //         header("Location: addreview.php?error=$er_msg");
    //     }
    // }
    // else {
    //     $new_img_name = $review_row['img_url'];
    // }

    $item_name = strtolower($_POST['item_name']);
    $res_name = $_POST['res_name'];
    $district_name = $_POST['district_name'];
    $rating_point = $_POST['rating_point'];
    $price = $_POST['price'];
    $meal_type = $_POST['meal_type'];
    $cuisine_type = $_POST['cuisine_type'];
    $review_text = $_POST['review_text'];
    //$review_image = $new_img_name;
    $edit_count = 1;

    // insert into review table
    /*
    UPDATE table_name
    SET column1=value, column2=value2,...
    WHERE some_column=some_value 

    img_url=$review_image
    */
    $sql = "UPDATE review
            SET
            item_name='$item_name',
            restaurant='$res_name',
            district='$district_name',
            rating='$rating_point',
            price='$price',
            meal_type='$meal_type',
            cuisine='$cuisine_type',
            description='$review_text',
            edit_count='$edit_count'

            WHERE review_id='$review_id'";

    mysqli_query($con, $sql);
    header("Location: full_review.php?review_id=$review_id");

}


?>