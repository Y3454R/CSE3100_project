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

if(isset($_POST['edit_review'])) {

    $item_name = strtolower($_POST['item_name']);
    $res_name = $_POST['res_name'];
    $district_name = $_POST['district_name'];
    $rating_point = $_POST['rating_point'];
    $price = $_POST['price'];
    $meal_type = $_POST['meal_type'];
    $cuisine_type = $_POST['cuisine_type'];
    $review_text = $_POST['review_text'];
    $edit_count = 1;

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

if(isset($_POST['dlt'])) {
    $old_image = 'uploads/'.$review_row['img_url'];
    unlink($old_image);
    $sql = "DELETE FROM review WHERE review_id=$review_id";
    mysqli_query($con, $sql);
    header("Location: home.php");
}


?>