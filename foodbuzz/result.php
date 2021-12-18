<?php
//form handler
require 'config/config.php';
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: index.php");
}

$district = $_GET['district'];
$price = $_GET['price'];
$meal_type = $_GET['meal_type'];

$q = "SELECT * FROM review WHERE district='$district' AND price BETWEEN 0 AND '$price' AND meal_type='$meal_type' ORDER BY rating DESC";
$matched_reviews = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<style>
ul{
  list-style-type: none;
}
.checked {
  color: orange;
}
</style>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<ul>

<?php
while($matched_review = mysqli_fetch_array($matched_reviews)) {
?>
<a href="full_review.php?review_id=<?php echo $matched_review['review_id']; ?>" target="blank" style="color: #1abc9c; text-decoration:none;"><li>
<h3><?php echo $matched_review['item_name']." (".$matched_review['restaurant'].")" ?></h3>
<?php $star_value = $matched_review['rating'];?>
<span class="fa fa-star <?php if($star_value >= 1) echo "checked"; ?>"></span>
<span class="fa fa-star <?php if($star_value >= 2) echo "checked"; ?>"></span>
<span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
<span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
<span class="fa fa-star <?php if($star_value >= 5) echo "checked"; ?>"></span>

<div class="div_home clearfix">
    <br>
    <img class="img_home" src="uploads/<?php echo $matched_review['img_url']?>" width="170" height="170">
    <p style="text-align:justify;" class="content">
    </p>
</li></a>

<?php } ?>

</ul>

</body>
</html>