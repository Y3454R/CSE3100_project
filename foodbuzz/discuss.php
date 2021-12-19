<?php

require 'handlers/discuss_handler.php';
?>


<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- add jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/fullreview.css">
<style>



</style>
</head>

<body>

<div class="header">
  <h1>Food Buzz</h1>
  <pre style= "font-family:verdana; font-size: 20px;">Plan!    Eat!    Share!</pre>
</div>

<div class="topnav" id="navbar"> <!-- id for sticky navigation bar -->
  <a href="home.php">Home</a>
  <a href="search.php">Search</a>
  <a href="discuss.php">Discuss</a>
  <a href="profile.php?profileId=<?php echo$user['id']; ?>">Profile</a>
  <a href="handlers/logout.php" style="float:right">Exit</a>
</div>

<div class="container">
  <form action="discuss.php" method="POST">
    <label for="topic">Topic</label>
    <input type="text" placeholder="Topic" name="topic">
    <label for="quesiton">Question</label>
    <textarea id="question" name="question" placeholder="Ask a question.." rows="2" ></textarea>
    <input type="submit" name="ask" value="ask">
  </form>
</div>

<?php
// $comments_query = mysqli_query($con, "SELECT * FROM comments WHERE review_id='$review_id' ORDER BY comment_id DESC");
// // $comment_row = mysqli_fetch_array($comments_query);
// while($comment_row = mysqli_fetch_array($comments_query)) {
//   $commenter_id = $comment_row['profile_id'];
//   $commenter_query = mysqli_query($con, "SELECT username FROM users WHERE id='$commenter_id'");
//   $commenter_row = mysqli_fetch_array($commenter_query);
?>

<!-- <div class="div_comment">
<h4 style="text-transform:none;"><a href="profile.php?profileId=<?php echo $commenter_id; ?>"> <?php echo $commenter_row['username']; ?> </a>  </h4>
<h6 style="font-style:italic;"><?php echo yeasarTimeMessage($comment_row['comment_time']); ?></h6>
<p><?php echo $comment_row['comment_text']; ?></p>
</div>
&nbsp; -->

<?php
//}
?>

<!-- JS script --> 
<script src="script/sticky.js"></script>
<script src="script/full_review.js"></script>

</body>
</html>