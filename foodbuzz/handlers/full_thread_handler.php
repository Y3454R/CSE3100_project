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

$d_id = $_GET['d_id'];

$user_id = $user['id'];

// discuss thread er info array
$discuss_details_query = mysqli_query($con, "SELECT * FROM discuss WHERE d_id='$d_id'");
$discuss_row = mysqli_fetch_array($discuss_details_query);

// topic writer er info array
$profile_id = $discuss_row['d_writer_id'];
$profile_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$profile_id'");
$profile_row = mysqli_fetch_array($profile_details_query);

if(isset($_POST['reply'])) {
    $d_comment_time = date("Y-m-d H:i:s");
    $d_comment_text = $_POST['reply_text'];
    $q = "INSERT INTO d_comments VALUES('', '$d_id', '$user_id', '$d_comment_time', '$d_comment_text')";
    mysqli_query($con, $q);
    $sql = "INSERT INTO d_notifications VALUES('', '$d_id', '$profile_id', '$d_comment_time')";
    mysqli_query($con, $sql);
    $comment_details_query = mysqli_query($con, "SELECT * FROM d_comments WHERE d_topic_id='$d_id'");
    while($comment_row = mysqli_fetch_array($comment_details_query)) {
        $receiver = $comment_row['d_commenter_id'];
        $sql = "INSERT INTO d_notifications VALUES('', '$d_id', '$receiver', '$d_comment_time')";
        mysqli_query($con, $sql);
    }
    header("Location: fullthread.php?d_id=$d_id");
}

if(isset($_POST['remove_discuss'])) {
    $remove_discuss_id = $_POST['remove_id'];
    $q = "DELETE FROM discuss WHERE d_id = '$remove_discuss_id'";
    mysqli_query($con, $q);
    header("Location: discuss.php");
}

if(isset($_POST['remove_reply'])) {
    $remove_comment_id = $_POST['remove_id'];
    $q = "DELETE FROM d_comments WHERE d_comment_id = '$remove_comment_id'";
    mysqli_query($con, $q);
    header("Location: fullthread.php?d_id=$d_id");
}

?>