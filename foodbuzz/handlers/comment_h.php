<?php

//require 'config/config.php';
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

// echo "<pre>";print_r($profile_row);echo"</pre>";

if(isset($_POST['comment'])) {
    $comment_time = date("Y-m-d H:i:s");
    $comment_text = $_POST['comment_text'];
    $parent_id = 0;
    $q = "INSERT INTO comments VALUES('', '$parent_id', '$review_id', '$user_id', '$comment_time', '$comment_text')";
    mysqli_query($con, $sql);
    header("Location: full_review.php?review_id=$review_id");
}

?>