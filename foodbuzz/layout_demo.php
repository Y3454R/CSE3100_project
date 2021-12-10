<?php // ref: https://www.w3schools.com/css/css_website_layout.asp ?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 5px;
  text-align: center;
  background: #1abc9c;
}

.header h1 {
  font-size: 50px;
  color: white;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  /*background-color: #aaa;*/
  width: 100%;
  padding: 20px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.imageCenter {
  
  display: block;
  margin-left: auto;
  margin-right: auto;
  
  width: 300px;
  height: 200px;
  padding: 15px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}



/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}

/* for read more, read less */
.description {
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.description p{
  font-size: 16px;
  text-align: justify;
}
.description button {
  background-color: #555555;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}

.hide {
  display: none;
}

</style>
</head>
<body>

<div class="header">
  <h1>Food Buzz</h1>
  <pre style= "font-family:verdana; font-size: 20px;">Plan!    Eat!    Share!</pre>
</div>

<div class="topnav">
  <a href="#">Buzz</a>
  <a href="#">Search</a>
  <a href="#">My Buzz</a>
  <a href="#" style="float:right">Exit</a>
</div>

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
        <div class="fakeimg" style="height:200px;"><img class="imageCenter" src="burger.jfif"></div>
        <!-- image ends -->

        <!-- description starts -->
        <div class="description">

        <!-- content paragraph starts-->
        <p class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.
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
      <h2>Bucket List</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h5>Top Menu</h5>
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

<script>

let noOfChars = 150;
let contents = document.querySelectorAll(".content");
contents.forEach(content => {
  if(content.textContent.length < noOfChars) {
    content.nextElementSibling.style.display = "none";
  }
  else {
    let displayText = content.textContent.slice(0, noOfChars);
    let moreText = content.textContent.slice(noOfChars);
    content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide more">${moreText}</span>`;

  }
});

function readMore(btn) {
  let description = btn.parentElement;
  description.querySelector(".dots").classList.toggle("hide");
  description.querySelector(".more").classList.toggle("hide");
  btn.textContent == "Read More" ? btn.textContent = "Read Less" : btn.textContent = "Read More";
}

</script>


</body>
</html>