<?php
include ("header.php");
?>

<div class="row">

  <div class="leftcolumn">
  
  <!-- database theke review gula nicchi -->
  <?php
    $sql = "SELECT * FROM review ORDER BY review_id DESC";
    $data_query = mysqli_query($con, $sql);
  ?>

  <?php
    if(mysqli_num_rows($data_query) > 0) {
      $num_iterations = 0; //number of results checked (not necessarily posted)
      $count = 1;
      while($row = mysqli_fetch_array($data_query)) { ?>

    <div class="card">
      
        <!-- info starts -->
        <h2> <?php echo $row['item_name']." (".$row['restaurant'].")" ?> </h2>
        <h5>Reviewer: <?php echo $row['user_id']; ?> </h5>
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