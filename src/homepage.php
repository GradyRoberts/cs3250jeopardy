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
  <link rel="stylesheet" href="styles/home.css" />
</head>

<body class="main-content">
  <?php include("header.html") ?>
  <div class="container">
    <div class="row">
      <div class="col-lg d-flex justify-content-center text-center column">
        <img style="margin: auto" src="img/image-placeholder.png" width="250" height="250" alt="placeholder" />
        <h4>Column 1</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec ligula non diam molestie aliquet. Etiam dui metus, porttitor et placerat quis, hendrerit et sapien. Sed scelerisque neque a odio pharetra hendrerit. Curabitur laoreet sit amet dolor ut dignissim.</p>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <img style="margin: auto" src="img/image-placeholder.png" width="250" height="250" alt="placeholder" />
        <h4>Column 2</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec ligula non diam molestie aliquet. Etiam dui metus, porttitor et placerat quis, hendrerit et sapien. Sed scelerisque neque a odio pharetra hendrerit. Curabitur laoreet sit amet dolor ut dignissim.</p>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <img style="margin: auto" src="img/image-placeholder.png" width="250" height="250" alt="placeholder" />
        <h4>Column 3</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec ligula non diam molestie aliquet. Etiam dui metus, porttitor et placerat quis, hendrerit et sapien. Sed scelerisque neque a odio pharetra hendrerit. Curabitur laoreet sit amet dolor ut dignissim.</p>
      </div>
    </div>
  </div>
  <?php include("footer.html") ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>