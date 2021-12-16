<?php

require 'handlers/full_review_handler.php';
// require 'handlers/comment_h.php';
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

<div class="div_home clearfix" style="text-transform:capitalize">
    <h3>Item name: <?php echo $review_row['item_name'] ?></h3>
    <h3> <?php echo $review_row['cuisine']." ".$review_row['meal_type'] ?></h3>
    <h3>Restaurant: <?php echo $review_row['restaurant'] ?></h3>
    <h3>Price: <?php echo $review_row['price'] ?> BDT (per unit)</h3>
    <?php $star_value = $review_row['rating']; ?>
    <span class="fa fa-star <?php if($star_value >= 1) echo "checked"; ?>"></span>
    <span class="fa fa-star <?php if($star_value >= 2) echo "checked"; ?>"></span>
    <span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
    <span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
    <span class="fa fa-star <?php if($star_value >= 5) echo "checked"; ?>"></span>
    <h3 style="text-transform:none;">Reviewer: <a href="profile.php?profileId=<?php echo $profile_row['id']; ?>"> <?php echo $profile_row['username']; ?> </a>  </h3>
    <p><?php echo yeasarTimeMessage($review_row['review_time']); ?></p>
    <a href="uploads/<?php echo $review_row['img_url']?>"><img class="img_home" src="uploads/<?php echo $review_row['img_url']?>" width="170" height="170"></a>
    <?php if($review_row['edit_count'] != 0) {?>
      <p style="font-style:italic">(Edited)</p>
    <?php } ?>
    <p style="text-align:justify;">
      <?php
        $reviewText = $review_row['description'];
        echo "$reviewText";
      ?>
    </p>

</div>


<div class="div_home clearfix">
<!-- ********************************like dislike************************************* -->

  <!-- like dislike option er jonno -->
  <div>
    <!-- like er jonno -->
    <i 
      <?php if(userLiked($review_row['review_id'])): ?>
        class="fa fa-thumbs-up like-btn"
      <?php else: ?>
        class="fa fa-thumbs-o-up like-btn"
      <?php endif ?> 
    data-id="<?php echo $review_row['review_id'] ?>"></i>

    <span class="likes"><?php echo getLikes($review_row['review_id']); ?></span>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <!-- dislike er jonno -->
    <i
      <?php if(userDisliked($review_row['review_id'])): ?>
        class="fa fa-thumbs-down dislike-btn"
      <?php else: ?> 
        class="fa fa-thumbs-o-down dislike-btn"
      <?php endif ?>
    data-id="<?php echo $review_row['review_id'] ?>"></i>
    <span class="dislikes"><?php echo getDislikes($review_row['review_id']);?></span>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <?php if ($review_row['user_id'] == $user_id) { ?> 
    <a href="edit_review.php?review_id=<?php echo $review_id ?>"><i class='fa fa-edit fa-lg'></i></a>
    <?php } ?>



    
    </div>

<!-- ********************************************************************************** -->


</div>


<div class="container">
  <form action="full_review.php?review_id=<?php echo $review_row['review_id'];?>" method="POST">
    <textarea id="comment_text" name="comment_text" placeholder="Comment here.." rows="2" ></textarea>
    <input type="submit" name="comment" value="Comment">
  </form>
</div>

<?php
$comments_query = mysqli_query($con, "SELECT * FROM comments WHERE review_id='$review_id' ORDER BY comment_id DESC");
// $comment_row = mysqli_fetch_array($comments_query);
while($comment_row = mysqli_fetch_array($comments_query)) {
  $commenter_id = $comment_row['profile_id'];
  $commenter_query = mysqli_query($con, "SELECT username FROM users WHERE id='$commenter_id'");
  $commenter_row = mysqli_fetch_array($commenter_query);
?>

<div class="div_comment">
<h4 style="text-transform:none;"><a href="profile.php?profileId=<?php echo $commenter_id; ?>"> <?php echo $commenter_row['username']; ?> </a>  </h4>
<h6 style="font-style:italic;"><?php echo yeasarTimeMessage($comment_row['comment_time']); ?></h6>
<p><?php echo $comment_row['comment_text']; ?></p>
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