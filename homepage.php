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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- 3. Style Sheet for NavBar -->
  <link rel="stylesheet" href="styles/home.css" />
</head>

<body>
  <?php include("header.html")?>
  <div class="container">
    <div class="row">
      <div class="col-sm d-flex justify-content-center text-center">
        <img src="img/image-placeholder.png" width="250" height="250" alt="placeholder"/>
      </div>
      <div class="col-sm d-flex justify-content-center text-center">
        <img src="img/image-placeholder.png" width="250" height="250" alt="placeholder"/>
      </div>
      <div class="col-sm d-flex justify-content-center text-center">
        <img src="img/image-placeholder.png" width="250" height="250" alt="placeholder"/>
      </div>
    </div>

    <div class="row">
      <div class="col-sm d-flex justify-content-center text-center">
        <p>Column</p>
      </div>
      <div class="col-sm d-flex justify-content-center text-center">
        <p>Column</p>
      </div>
      <div class="col-sm d-flex justify-content-center text-center">
        <p>Column</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>