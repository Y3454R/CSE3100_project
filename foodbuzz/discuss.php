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
    <input type="text" placeholder="Topic" name="topic" required>
    <label for="quesiton">Question</label>
    <textarea id="question" name="question" placeholder="Ask a question.." rows="2" required></textarea>
    <input type="submit" name="ask" value="ask">
  </form>
</div>

<?php
$discuss_query = mysqli_query($con, "SELECT * FROM discuss ORDER BY d_id DESC");
while($discuss_row = mysqli_fetch_array($discuss_query)) {
  $d_writer_id = $discuss_row['d_writer_id'];
  $writer_query = mysqli_query($con, "SELECT * FROM users WHERE id='$d_writer_id'");
  $writer_row = mysqli_fetch_array($writer_query);
?>

<div class="div_home">
  <a href="fullthread.php?d_id=<?php echo $discuss_row['d_id']; ?>" target="blank"> <h2>Topic: <?php echo $discuss_row['d_topic']; ?></h2> </a>
  <h4 style="text-transform:none;">By: <a href="profile.php?profileId=<?php echo $writer_row['id']; ?>"> <?php echo $writer_row['username']; ?> </a>  </h4>
  <h6 style="font-style:italic;"><?php echo yeasarTimeMessage($discuss_row['d_time']); ?></h6>
  <p><?php echo $discuss_row['d_text']; ?></p>
  <a href="fullthread.php?d_id=<?php echo $discuss_row['d_id']; ?>" target="blank"><button>Reply</button></a>
</div>
&nbsp;

<?php
}
?>

<!-- JS script --> 
<script src="script/sticky.js"></script>
<script src="script/full_review.js"></script>

</body>
</html>