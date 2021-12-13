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

// echo "<pre>";
// print_r($user);
// echo "</pre>";

// echo $_GET['profileId'];

$profileId = $_GET['profileId'];

if($profileId == $user['id']) {
    $wanted_profile = $user;
}
else {
    $profile_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$profileId'");
    $wanted_profile = mysqli_fetch_array($profile_details_query);
}


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
  <a href="profile.php?profileId=<?php echo$user['id']; ?>">Profile</a>
  <a href="handlers/logout.php" style="float:right">Exit</a>
</div>

<div class="row">

    <div class = "leftcolumn">
        <p></p>
    </div>

    
    <div class="rightcolumn">

        <div class="card">
        <img src="<?php echo$wanted_profile['profile_pic']?>" style="width:70%">
        <h1><?php echo$wanted_profile['first_name']." ".$wanted_profile['last_name'];?></h1>
        <p class="title"><?php echo$wanted_profile['district']; ?></p>
        <p><?php echo$wanted_profile['username'] ?></p>
        <?php if($user['id'] == $wanted_profile['id']) echo "<p><button>Change Profile Picture</button></p>" ?> <!-- change profile picture -->
        </div>
        
    </div>

</div>


<script src="script/sticky.js"></script>

</body>
</html>