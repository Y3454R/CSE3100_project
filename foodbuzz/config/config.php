<?php

ob_start(); // output buffering on hobe
session_start();

$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost", "root", "", "foodbuzz"); // connnection variable foodbuzz- server er nam

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
// else {
//     echo "connected<br>";
// }

// time message function
function yeasarTimeMessage($post_time) {
    //time of post
    $date_time_now = date("Y-m-d H:i:s");
    $start_date= new DateTime($post_time); //time of post
    $end_date = new DateTime($date_time_now); //current time
    $interval = $start_date->diff($end_date); //difference between dates

    if($interval->y >= 1) {
        if($interval == 1)
            $time_message = $interval->y." year ago"; // 1year ago
        else
            $time_message = $interval->y." years ago"; // 1+ years ago
    }
    elseif($interval->m >= 1) {
        if($interval->d == 0) {
            $days = " ago";
        }
        elseif($interval->d == 1) {
            $days = $interval->d." day ago";
        }
        else {
            $days = $interval->d. " days ago";
        }

        if($interval->m == 1) {
            $time_message = $interval->m. " month".$days;
        }
        else {
            $time_message = $interval->m. " months".$days;
        }
    }

    elseif($interval->d >= 1) {
        if($interval->d == 1) {
            $time_message = "Yesterday";
        }
        else {
            $time_message = $interval->d. " days ago";
        }
    }

    elseif($interval->h >= 1) {
        if($interval->h == 1) {
            $time_message = $interval->h." hour ago";
        }
        else {
            $time_message = $interval->h." hours ago";
        }
    }

    elseif($interval->i >= 1) {
        if($interval->i == 1) {
            $time_message = $interval->i." minute ago";
        }
        else {
            $time_message = $interval->i." minutes ago";
        }
    }

    else {
        if($interval->s < 30) {
            $time_message = "Just now";
        }
        else {
            $time_message = $interval->s." seconds ago";
        }
    }
    return $time_message;
}




?>