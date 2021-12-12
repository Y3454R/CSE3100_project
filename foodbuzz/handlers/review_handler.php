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


// variable keeping data from review form and to insert in review table
$user_id = $user['id'];
$item_name = "";
$res_name = "";
$district_name = "";
$rating_point = "";
$price = "";
$meal_type = "";
$cuisine_type = "";
$review_text = "";
$review_image = "";
$upvote = 0;
$downvote = 0;
$comment_count = 0;
$review_time = "";

if(isset($_POST['publish_review']) && isset($_FILES['review_image'])) {
    /*
    $item_name = $_POST['item_name'];
    /*test (successful)
    echo "$item_name";
    */

    /* image */
    echo "<pre>";
    print_r($_FILES['review_image']);
    echo "</pre>";

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
            header("Location: addreview.php?error=$er_msg");
        }
    }
    else {
        $er_msg = "unknown error occurred!";
        header("Location: addreview.php?error=$er_msg");
    }
    /* image ends */

    $item_name = strtolower($_POST['item_name']);
    $res_name = $_POST['res_name'];
    $district_name = $_POST['district_name'];
    $rating_point = $_POST['rating_point'];
    $price = $_POST['price'];
    $meal_type = $_POST['meal_type'];
    $cuisine_type = $_POST['cuisine_type'];
    $review_text = $_POST['review_text'];
    $review_image = $new_img_name;
    $review_time = date("Y-m-d h:i:s");

    // insert into review table
    $sql = "INSERT INTO review VALUES(
        '',
        '$user_id',
        '$item_name',
        '$res_name',
        '$district_name',
        '$rating_point',
        '$price',
        '$meal_type',
        '$cuisine_type',
        '$review_text',
        '$upvote',
        '$downvote',
        '$comment_count',
        '$review_time',
        '$review_image'
    )";

    mysqli_query($con, $sql);
    header('Location: home.php');

}


?>