<?php
include ("header.php");
?>

<div class="row">

  <div class="leftcolumn">

  <?php for($it = 0; $it < 3; $it++) { ?>

    <div class="card">
      
        <!-- info starts -->
        <h2>Food Review <?php $number = $it+1; echo "$number" ?> </h2>
        <h5>Reviewer: Username </h5>
        <h5>Rating:4/5</h5>
        <h5>Date: 12/12/21</h5>
        <h5>Meal Type: Snack</h5>
        <h5>Taste: Spicy</h5>
        <!-- info ends -->

        <!-- image starts -->
        <div class="fakeimg" style="height:200px;"><img class="imageCenter" src="image/burger.jfif"></div>
        <!-- image ends -->

        <!-- description starts -->
        <div class="description">

        <!-- content paragraph starts-->
        <?php
          /* This text will come from sql server" */
          $reviewText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.";
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