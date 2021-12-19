<?php
require 'handlers/full_thread_handler.php';
?>


<!DOCTYPE html>
<html>

<head>
<!-- css link -->
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- add jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/discuss.css">
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

<div class="div_home clearfix" style="text-transform:capitalize">
    <h3>Topic: <?php echo $discuss_row['d_topic'] ?></h3>
    
    <p style="text-align:justify;">
      <?php
        $discussText = $discuss_row['d_text'];
        echo "$discussText";
      ?>
    </p>
    <?php if($user_id == $profile_id) {?>

    <form action="fullthread.php?d_id=<?php echo $d_id;?>" method="POST">
        <input type="hidden" name="remove_id" value = "<?php echo $d_id ?>">
        <input type="submit" name="remove_discuss" value="Remove" style="background-color:red;">
    </form>

    <?php } ?>

</div>


<div class="div_home clearfix">

</div>


<div class="container">
  <form action="fullthread.php?d_id=<?php echo $d_id;?>" method="POST">
    <textarea id="reply_text" name="reply_text" placeholder="Reply" rows="2" required></textarea>
    <input type="submit" name="reply" value="Reply">
  </form>
</div>

<h2 style="text-align:center;">Replies:</h2>

<?php
$discuss_comments_query = mysqli_query($con, "SELECT * FROM d_comments WHERE d_topic_id='$d_id' ORDER BY d_comment_id DESC");
while($discuss_comment_row = mysqli_fetch_array($discuss_comments_query)) {
  $d_commenter_id = $discuss_comment_row['d_commenter_id'];
  $commenter_query = mysqli_query($con, "SELECT username FROM users WHERE id='$d_commenter_id'");
  $commenter_row = mysqli_fetch_array($commenter_query);
?>

<div class="div_comment">
<h4 style="text-transform:none;"><a href="profile.php?profileId=<?php echo $d_commenter_id; ?>"> <?php echo $commenter_row['username']; ?> </a>  </h4>
<h6 style="font-style:italic;"><?php echo yeasarTimeMessage($discuss_comment_row['d_comment_time']); ?></h6>
<p><?php echo $discuss_comment_row['d_comment_text']; ?></p>

<?php if($d_commenter_id == $user_id || $user_id == $profile_id) {?>
  <form action="fullthread.php?d_id=<?php echo $d_id ?>" method="POST">
      <input type="hidden" name="remove_id" value = "<?php echo $discuss_comment_row['d_comment_id']; ?>">
      <input type="submit" name="remove_reply" value="Remove" style="background-color:red;">
  </form>
<?php } ?>

</div>
&nbsp;

<?php
}
?>

<!-- JS script --> 
<script src="script/sticky.js"></script>

</body>
</html>