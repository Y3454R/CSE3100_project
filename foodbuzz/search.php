<?php
//form handler
require 'handlers/search_handler.php';

?>

<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<link rel="stylesheet" href="css/search.css">
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
<div class="box">
    <form action="search.php" method="POST">

        <label for="district_name">Location</label>
        <select id="district_name" name="district_name"> 
            <option value="dhaka">Dhaka</option>
            <option value="khulna" selected>Khulna </option>
            <option value="rangpur">Rangpur</option>     
        </select>
        <br>

        <!-- price -->
        <label for="price">Price in BDT (Per unit)</label>
        <input type="number" id="price" name="price" min="1"> 
        <br>

        <!-- meal type -->
        <label for="meal_type">Meal</label>
        <select id="meal_type" name="meal_type"> 
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="snacks" selected>Snacks</option>
            <option value="dinner">Dinner</option>
            <option value="beverage">Beverage</option>
            <option value="desert">Desert and Sweets</option>
        </select>
        <br>
        <input type="submit" id="search" value="Search" name="search">
    </form>

</div>
</body>
</html>