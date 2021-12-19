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


if(isset($_POST['action']) && !isset($_POST['comment'])) {
    $post_id = $_POST['post_id'];
    $action = $_POST['action'];
    
    switch ($action) {
        case 'like':
            $sql = "INSERT INTO rating_info(post_id, user_id, rating_action) VALUES ($post_id, $user_id, '$action') ON DUPLICATE KEY UPDATE rating_action='like'";
            break;
        case 'dislike':
            $sql = "INSERT INTO rating_info(post_id, user_id, rating_action) VALUES ($post_id, $user_id, '$action') ON DUPLICATE KEY UPDATE rating_action='dislike'";
            break;
        case 'unlike':
            $sql = "DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
            break;
        case 'undislike':
            $sql = "DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
            break;
        default:
            break;
    }

    mysqli_query($con, $sql);
    echo getRating($post_id);
    exit(0);
}


// get number of likes and dislikes

function getRating($id)
{
  global $con;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($con, $likes_query);
  $dislikes_rs = mysqli_query($con, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}


// likes er number er jonno
// Get total number of likes for a particular post
function getLikes($id)
{
    global $con;
    $sql = "SELECT COUNT(*) FROM rating_info 
            WHERE post_id = $id AND rating_action='like'";
    $rs = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
    global $con;
    $sql = "SELECT COUNT(*) FROM rating_info 
            WHERE post_id = $id AND rating_action='dislike'";
    $rs = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $con;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }
  else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $con;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }
  else{
  	return false;
  }
}

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
    mysqli_query($con, $q);
    $reviewer = $review_row['user_id'];
    $sql = "INSERT INTO notifications VALUES('', '$review_id', '$reviewer', '$comment_time')";
    mysqli_query($con, $sql);
    $comment_details_query = mysqli_query($con, "SELECT * FROM comments WHERE review_id='$review_id'");
    while($comment_row = mysqli_fetch_array($comment_details_query)) {
        $receiver = $comment_row['profile_id'];
        $sql = "INSERT INTO notifications VALUES('', '$review_id', '$receiver', '$comment_time')";
        mysqli_query($con, $sql);
    }
    header("Location: full_review.php?review_id=$review_id");
}

if(isset($_POST['remove_comment'])) {
    $remove_comment_id = $_POST['remove_id'];
    $q = "DELETE FROM comments WHERE comment_id = '$remove_comment_id'";
    mysqli_query($con, $q);
    header("Location: full_review.php?review_id=$review_id");
}

?>