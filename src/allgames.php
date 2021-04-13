<?php 
require('isLocalhost.php');
if (isLocalhost()) {
  session_start(); 
  if (! isset($_SESSION['user'])) {
      header("Location: loginpage.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
  Bootstrap is designed to be responsive to mobile.
  Mobile-first styles are part of the core framework.
   
  width=device-width sets the width of the page to follow the screen-width
  initial-scale=1 sets the initial zoom level when the page is first loaded   
  -->

  <meta name="author" content="Daniel Collins & Grady Roberts">
  <meta name="description" content="Course Project">

  <title>UVA Jeopardy</title>

  <!--Reset CSS before loading bootstrap-->
  <link rel="stylesheet" href="styles/reset.css" />

  <!-- 3. link bootstrap -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- 3. Style Sheets -->
  <link rel="stylesheet" href="styles/allgamespage.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/navbar.css" />
  <link rel="stylesheet" href="styles/footer.css" />
</head>

<body class="main-content">
  <?php include("header.html") ?>
  <div class="container">
    <div class="row">
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="gamebox">
          <h4>Game of the Month</h4>
          <div class="game">
            <label><b>UVA Trivia</b></label></br>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>

        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="gamebox">
          <h4>Your Games</h4>
          <div class="game">
            <label><b>CS 2110</b></label>
            <label>1500</label>
            <i onclick="like(this)" class="fa fa-thumbs-o-up"></i>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>CS 4640</b></label>
            <label>1500</label>
            <i onclick="like(this)" class="fa fa-thumbs-o-up"></i>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>Famous Pirates</b></label>
            <label>500</label>
            <i onclick="like(this)" class="fa fa-thumbs-o-up"></i>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>Buildings at UVA</b></label>
            <label class="test">800</label>
            <i onclick="like(this)" class="fa fa-thumbs-o-up"></i>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="gamebox">
          <h4>Game Search</h4>
          <form action="allgames.php" method="post" style="margin:2px">
            <input type="text" name="gamename" id="gamename" placeholder="Game Name" required />
            <input type="submit" value="Search" class="btn btn-secondary btn-md" />
          </form>
          <br />
        </div>
      </div>
    </div>
  </div>
  <?php include("footer.html") ?>
  
  <script>
    function answerSelect() {
      var str = document.getElementById("answerselect").value
      if (!"Multiple Choice".localeCompare(str)) {
        document.getElementsByName('answer')[0].placeholder = `Format multiple choice answers like "A,answer,B,answer...l`;
      } else {
        document.getElementsByName('answer')[0].placeholder = `Enter free-response answer here`;
      }
    }

    function like(x) {
      x.classList.toggle("fa-thumbs-up");
    }
  </script>
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>