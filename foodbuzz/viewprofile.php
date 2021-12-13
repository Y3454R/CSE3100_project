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

echo "<pre>";
print_r($user);
echo "</pre>";

?>

<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<link rel="stylesheet" href="css/profile.css">
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
  <a href="profile.php">Profile</a>
  <a href="handlers/logout.php" style="float:right">Exit</a>
</div>

<div class="row">

    <div class = "leftcolumn">
        <p></p>
    </div>

    
    <div class="rightcolumn">

        <div class="card">
        <img src="<?php echo$user['profile_pic']?>" style="width:70%">
        <h1><?php echo$user['first_name']." ".$user['last_name'];?></h1>
        <p class="title"><?php echo$user['district']; ?></p>
        <p><?php echo$user['username'] ?></p>
        if()
        </div>
        
    </div>

</div>


<script src="script/sticky.js"></script>

</body>
</html>