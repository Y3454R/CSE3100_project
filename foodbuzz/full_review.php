<?php

require 'handlers/full_review_handler.php';

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
.checked {
    color: orange;
}
a:link,:visited {
    text-decoration: none;
    color:#1abc9c;
}

a:hover {
    color:#555555;
}

.div_home {
    background-color: white;
    /* border: 3px solid #1abc9c; */
    padding: 15px;                             /* image ar etay same padding thakte hobe */
}


.img_home {
    float: left;
    padding: 15px;
}

.clearfix {
    overflow: auto;
}

/* for like dislike */

.fa-thumbs-down, .fa-thumbs-o-down, .fa-thumbs-up, .fa-thumbs-o-up {
    font-size: 1.5em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
    transform:rotateY(180deg);
}


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

    
    </div>

<!-- ********************************************************************************** -->

</div>


<div class="container">
  <form action="full_review.php" method="POST" enctype="multipart/form-data">
    <!-- description -->
    <textarea id="review_text" name="review_text" placeholder="Comment here.." rows="2" ></textarea>

    <input type="submit" name="publish_review" value="Publish">
  </form>
</div>

<!-- JS script --> 
<script src="script/sticky.js"></script>
<script src="script/full_review.js"></script>

</body>
</html>