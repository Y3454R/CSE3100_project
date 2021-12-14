<?php
//form handler
require 'handlers/dp_handler.php';

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

<h3 style="text-align:center; color:#1abc9c">Change Your Profile Picture</h3>

<div class="container">
  <form action="dp.php" method="POST" enctype="multipart/form-data">
    <!-- image -->
    <label for="dp_image">Attach a photo (.jpg, .png or .jpeg) </label>
    <br>
    <input type="file" name="dp_image" style="text-align:center;">
    <br>
    <!-- submit -->
    <input type="submit" name="upload" value="Upload">
  </form>
</div>

<!-- JS script --> 
<script src="script/sticky.js"></script>

</body>
</html>