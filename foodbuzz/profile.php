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

$profileId = $_GET['profileId']; // link theke profileId er value ta nicchi ekhane

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

    <?php
        //echo "<pre>";print_r($wanted_profile);echo"</pre>";
        $wanted_profile_id = $wanted_profile['id'];
        $review_query = mysqli_query($con, "SELECT * FROM review WHERE user_id='$wanted_profile_id' ORDER BY review_id DESC");
        while($review_list = mysqli_fetch_array($review_query)) {
            //echo "<pre>";print_r($review_list);echo"</pre>";  
    ?>
        <!-- imagegular size shoman hocche naaaaaaaaaaaaaaaa!!!! -->
        <div class="gallery">
            <a target="_blank" href="uploads/<?php echo $review_list['img_url']; ?>">
                <img src="uploads/<?php echo$review_list['img_url']; ?>" width="600" height="400" >
            </a>
            <div class="desc"><a href="full_review.php"> <h4 style="text-transform: capitalize;"> <?php echo $review_list['item_name']." (".$review_list['restaurant'].")" ?> </h4> </a></div>
        </div>
    <?php } ?>

    </div>

    
    <div class="rightcolumn">

        <div class="card">
        <img src="<?php echo$wanted_profile['profile_pic']?>" style="width:70%">
        <h1><?php echo$wanted_profile['first_name']." ".$wanted_profile['last_name'];?></h1>
        <p class="title"><?php echo$wanted_profile['district']; ?></p>
        <p><?php echo$wanted_profile['username'] ?></p>
        <?php if($user['id'] == $wanted_profile['id']) echo "<p><button>Change Profile Picture</button></p>" ?> <!-- change profile picture -->
        <?php if($user['id'] == $wanted_profile['id']) {?>
            <a href="addreview.php"><?php echo"<p><button>Create Review</button></p>"; ?></a> 
        <?php } ?> 
        </div>
        
    </div>

</div>


<script src="script/sticky.js"></script>

</body>
</html>