<?php

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: index.php");
}
if(isset($_POST['clear'])) {
    $receiver_id = $user['id'];
    $sql = "DELETE FROM notifications WHERE receiver_id='$receiver_id'";
    mysqli_query($con, $sql);
    header("Location: home.php");
}


?>