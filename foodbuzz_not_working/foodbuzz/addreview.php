<?php
//form handler
require 'handlers/review_handler.php';

?>

<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<link rel="stylesheet" href="css/review.css">
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

<h3 style="text-align:center; color:#1abc9c">Create A Review</h3>

<div class="container">
  <form action="addreview.php" method="POST" enctype="multipart/form-data">
    <!-- item name -->
    <label for="item_name">Item Name</label>
    <input type="text" id="item_name" name="item_name" placeholder="What you ate.." >

    <!-- restaurant -->
    <label for="res_name">Restaurant</label>
    <input type="text" id="res_name" name="res_name" placeholder="Where you ate.." >

    <!-- District -->
    <label for="district_name">Location</label>
    <select id="district_name" name="district_name" > <!-- preselect option must be changed -->
        <option value="dhaka">Dhaka</option>
        <option value="khulna" selected>Khulna </option>
        <option value="rangpur">Rangpur</option>     
    </select>

    <!-- rating -->
    <label for="rating_point">Rate (within 5) </label>
    <input type="number" id="rating_point" name="rating_point" placeholder="Rate.." min="1" max="5" > <!-- limit dite hobe jeno >=1 <=5 -->

    <!-- price -->
    <label for="price">Price in BDT (Per unit)</label>
    <input type="number" id="price" name="price" placeholder="Price.." min="1" > <!-- limit dite hobe jeno > 0 -->
    <br>

    <!-- meal type -->
    <label for="meal_type">Meal</label>
    <select id="meal_type" name="meal_type" > <!-- preselect option must be changed -->
        <option value="breakfast">Breakfast</option>
        <option value="lunch">Lunch</option>
        <option value="snacks" selected>Snacks</option>
        <option value="dinner">Dinner</option>
        <option value="beverage">Beverage</option>
        <option value="desert">Desert and Sweets</option>
    </select>

    <!-- what cuisine -->
    <label for="cuisine_type">Cuisine</label>
    <select id="cuisine_type" name="cuisine_type" > <!-- preselect option must be changed -->
        <option value="deshi" selected>Deshi</option>
        <option value="street">Street food</option>
        <option value="fast">Fast food</option>
        <option value="mughal">Mughal</option>
        <option value="chinese">Chinese</option>
        <option value="mexican">Mexican</option>
        <option value="italian">Italian</option>
        <option value="other">Other</option>
    </select>

    <!-- description -->
    <label for="review_text">Subject</label>
    <textarea id="review_text" name="review_text" placeholder="What do you think.." style="height:200px" ></textarea>

    <!-- image -->
    <label for="review_image">Attach a photo (.jpg, .png or .jpeg) </label>
    <br>
    <input type="file" name="review_image" >
    <br>

    <input type="submit" name="publish_review" value="Publish">
  </form>
</div>

<!-- JS script --> 
<script src="script/sticky.js"></script>

</body>
</html>