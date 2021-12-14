<?php
include ("header.php");
//ref of newsfeed: https://www.w3schools.com/css/tryit.asp?filename=trycss_layout_clearfix
?>

<div class="row">

  <div class="leftcolumn">

  <?php

    // database theke review gula nicchi
    $sql = "SELECT * FROM review ORDER BY review_id DESC";
    $data_query = mysqli_query($con, $sql);
  
    if(mysqli_num_rows($data_query) > 0) {

      while($row = mysqli_fetch_array($data_query)) {

        $reviewerId = $row['user_id'];
        $date_time = $row['review_time'];
        
        $reviwer_query = mysqli_query($con, "SELECT username FROM users WHERE id='$reviewerId'");
        $reviewer_row = mysqli_fetch_array($reviwer_query);
        $reviewer_username = $reviewer_row['username'];

        //time of post
        $date_time_now = date("Y-m-d H:i:s");
        $start_date= new DateTime($date_time); //time of post
        $end_date = new DateTime($date_time_now); //current time
        $interval = $start_date->diff($end_date); //difference between dates

        // $end_result = $end_date->format('Y-m-d H:i:s');
        // $start_result = $start_date->format('Y-m-d H:i:s');
        // echo $end_result."<br>".$start_result."<br>";
        // echo $interval->y." ".$interval->m." ".$interval->d." ".$interval->h." ".$interval->i." ".$interval->s."<br>";

        if($interval->y >= 1) {
            if($interval == 1)
                $time_message = $interval->y." year ago"; // 1year ago
            else
                $time_message = $interval->y." years ago"; // 1+ years ago
        }
        elseif($interval->m >= 1) {
            if($interval->d == 0) {
                $days = " ago";
            }
            elseif($interval->d == 1) {
                $days = $interval->d." day ago";
            }
            else {
                $days = $interval->d. " days ago";
            }

            if($interval->m == 1) {
                $time_message = $interval->m. " month".$days;
            }
            else {
                $time_message = $interval->m. " months".$days;
            }
        }

        elseif($interval->d >= 1) {
            if($interval->d == 1) {
                $time_message = "Yesterday";
            }
            else {
                $time_message = $interval->d. " days ago";
            }
        }

        elseif($interval->h >= 1) {
            if($interval->h == 1) {
                $time_message = $interval->h." hour ago";
            }
            else {
                $time_message = $interval->h." hours ago";
            }
        }

        elseif($interval->i >= 1) {
            if($interval->i == 1) {
                $time_message = $interval->i." minute ago";
            }
            else {
                $time_message = $interval->i." minutes ago";
            }
        }

        else {
            if($interval->s < 30) {
                $time_message = "Just now";
            }
            else {
                $time_message = $interval->s." seconds ago";
            }
        }
        /* time ends */

  ?>

  <h2 style="clear:right"><?php echo $row['item_name']." (".$row['restaurant'].")" ?></h2>
  <!-- star rating dekhanor jonno shuru -->
  <?php $star_value = $row['rating']; ?>
  <span class="fa fa-star <?php if($star_value >= 1) echo "checked"; ?>"></span>
  <span class="fa fa-star <?php if($star_value >= 2) echo "checked"; ?>"></span>
  <span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
  <span class="fa fa-star <?php if($star_value >= 3) echo "checked"; ?>"></span>
  <span class="fa fa-star <?php if($star_value >= 5) echo "checked"; ?>"></span>
  <!-- star rating dekhanor jonno shesh -->
  <h5 style="text-transform:none;">Reviewer: <a href="profile.php?profileId=<?php echo$reviewerId ?>"> <?php echo $reviewer_username; ?> </a>  </h5>
  <p><?php echo $time_message ?></p>

  <div class="div_home clearfix description">
    
    <img class="img_home" src="uploads/<?php echo $row['img_url']?>" width="170" height="170">
    <p style="text-align:justify;" class="content">
      <?php
        /* This text will come from sql server" */
        $reviewText = $row['description'];
        echo "$reviewText";
      ?>
    </p>
    
      <!-- read more button -->
    <button onclick="readMore(this)">Read More</button>

  </div>
  <!-- adding like unlike -->
  <div><br></div> <!-- padding diye change kora zay kina dekhte hobe -->
  <!-- like dislike option er jonno -->
  <div>
  <!-- like er jonno -->
  <i 
    <?php if(userLiked($row['review_id'])): ?>
      class="fa fa-thumbs-up like-btn"
    <?php else: ?>
      class="fa fa-thumbs-o-up like-btn"
    <?php endif ?> 
  data-id="<?php echo $row['review_id'] ?>"></i>

  <span class="likes"><?php echo getLikes($row['review_id']); ?></span>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <!-- dislike er jonno -->
  <i
    <?php if(userDisliked($row['review_id'])): ?>
      class="fa fa-thumbs-down dislike-btn"
    <?php else: ?> 
      class="fa fa-thumbs-o-down dislike-btn"
    <?php endif ?>
  data-id="<?php echo $row['review_id'] ?>"></i>
  <span class="dislikes"><?php echo getDislikes($row['review_id']);?></span>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <!-- comment er jonno -->
  <a href="full_review.php" ><i class="fa fa-comments-o" aria-hidden="true"  style="font-size:1.5em"></i></a>
  
  </div>

  <?php } } ?>
  
    
 </div>
    
  <div class="rightcolumn">
    <div class="card">
      <div style="width:50%;margin:0 auto">
        <button class="buttonStyle buttonStyle1" onclick="document.location='addreview.php'">Add Review</button>
      </div>
    </div>

    <div class="card">
      <h2>Top Menu</h2>
      <div class="postimg" style="height:100px;">Image</div>
      <div class="postimg" style="height:100px;">Image</div>
      <div class="postimg" style="height:100px;">Image</div>
      <div class="postimg" style="height:100px;">Image</div>
    </div>

    <div class="card">
      <h2>Bucket List</h2>
      <div class="postimg"><p>Image</p></div>
      <div class="postimg"><p>Image</p></div>
      <div class="postimg"><p>Image</p></div>
    </div>

    <div class="card">
      <h5>Follow Me</h5>
      <p>Some text..</p>
    </div>

  </div>
  
</div>

<!-- JS script --> 
<script src="script/homeScript.js"></script>
<script src="script/like.js"></script>

</body>

</html>