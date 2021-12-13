<?php
include ("header.php");
?>

<div class="row">

  <div class="leftcolumn">
  
  <!-- database theke review gula nicchi -->
  <?php
    $sql = "SELECT * FROM review ORDER BY review_id DESC";
    $data_query = mysqli_query($con, $sql);
  
    if(mysqli_num_rows($data_query) > 0) {

      // $num_iterations = 0; //number of results checked (not necessarily posted)
      // $count = 1;

      while($row = mysqli_fetch_array($data_query)) {

        $reviewerId = $row['user_id'];
        $date_time = $row['review_time'];
        //echo $date_time."<br>";
        
        $reviwer_query = mysqli_query($con, "SELECT username FROM users WHERE id='$reviewerId'");
        $reviewer_row = mysqli_fetch_array($reviwer_query);
        $reviewer_username = $reviewer_row['username'];

        //timeframe
        $date_time_now = date("Y-m-d H:i:s");
        $start_date= new DateTime($date_time); //time of post    // sql diye nite hobeeeeeeee..................
        $end_date = new DateTime($date_time_now); //current time
        $interval = $start_date->diff($end_date); //difference between dates
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
        /* time frame ends */

  ?>

    <div class="card">
      
        <!-- info starts -->
        <h2> <?php echo $row['item_name']." (".$row['restaurant'].")" ?> </h2>
        <p><?php echo $time_message ?></p>

        <h5 style="text-transform:none;">Reviewer: <a href="profile.php?profileId=<?php echo$reviewerId ?>"> <?php echo $reviewer_username; ?> </a>  </h5>   <!-- profile er link href diye pathaite hobe viewprofile.php te -->
        
        <h5>Rating: <?php echo $row['rating']; ?>/5</h5>
        <!-- <h5>Date: 12/12/21</h5> -->
        <h5>Meal Type: <?php echo $row['meal_type'];?> </h5>
        <!-- info ends -->

        <!-- image starts -->
        <div class="fakeimg" style="height:200px;"><img class="imageCenter" src="uploads/<?php echo $row['img_url']?>"></div>
        <!-- image ends -->

        <!-- description starts -->
        <div class="description">

        <!-- content paragraph starts-->
        <?php
          /* This text will come from sql server" */
          $reviewText = $row['description'];
        ?>
        <p class="content">
        <?php echo "$reviewText"; ?>
        </p>
        <!-- content paragraph ends-->

        <!-- read more button -->
        <button onclick="readMore(this)">Read More</button>

        </div>
        <!-- description ends -->
        <!-- <div><h2>like</h2></div> -->
      
      </div>

    <?php } ?>
  <?php } ?>
    
 </div>
    
  <div class="rightcolumn">
    <div class="card">
      <div style="width:50%;margin:0 auto">
        <button class="buttonStyle buttonStyle1" onclick="document.location='addreview.php'">Add Review</button>
      </div>
    </div>
    <div class="card">
      <h2>Top Menu</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <div class="fakeimg" style="height:100px;">Image</div>
      <div class="fakeimg" style="height:100px;">Image</div>
      <div class="fakeimg" style="height:100px;">Image</div>
    </div>
    <div class="card">
      <h2>Bucket List</h2>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
    </div>
    <div class="card">
      <h5>Follow Me</h5>
      <p>Some text..</p>
    </div>
  </div>
</div>

<!-- JS script --> 
<script src="script/homeScript.js"></script>

</body>

</html>