<?php
//form handler
require 'handlers/image_handler.php';

?>

<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<link rel="stylesheet" href="css/dp.css">
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

<h3 style="text-align:center; color:#1abc9c">Change the picture</h3>

<div class="container">
  <form action="review_image.php?review_id=<?php echo $review_id; ?>" method="POST" enctype="multipart/form-data">
    <!-- image -->
    <label for="review_image">Attach a photo (.jpg, .png or .jpeg) </label>
    <br>
    <input type="file" name="review_image" style="text-align:center;">
    <br>
    <!-- submit -->
    <input type="submit" name="upload" value="Upload">
  </form>
</div>

<!-- JS script --> 
<script src="script/sticky.js"></script>

</body>
</html>