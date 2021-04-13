<!--#session_start();
//if (!isset($_COOKIE['user'])) {
  //header("Location: loginpage.php");
//}-->
<?php
require('connectdb.php');
global $pdo;
//Form Handlers
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if ($_POST['form'] == "AccountForm") { //Change to the Account
    if ($_POST['button'] == "Update Account") {
      $query = 'UPDATE Users SET fname = :fname, lname = :lname WHERE email = :email';
      $statement = $pdo->prepare($query);
      $statement->bindValue(':email', $_COOKIE['user'], PDO::PARAM_STR);
      $statement->bindValue(':fname', $_POST['fname'], PDO::PARAM_STR);
      setcookie('fname', $_POST['fname'], time() + 3600);
      $statement->bindValue(':lname', $_POST['lname'], PDO::PARAM_STR);
      setcookie('lname', $_POST['lname'], time() + 3600);
      $statement->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
    } else if ($_POST['button'] == "Delete Account") {
      $query = 'DELETE FROM Users
      WHERE email = :email';
      $statement = $pdo->prepare($query);
      $statement->bindValue(':email', $_COOKIE['user'], PDO::PARAM_STR);
      $statement->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
      header('Location: /logout.php');  #Redirects to home page
    }
  } else if ($_POST['form'] == "QuestionForm") { //Change to the Questions Form
    $query = 'INSERT INTO Questions (question, atype, answer, email) VALUES (:question, :atype, :answer, :email)'; //Create User
    $statement = $pdo->prepare($query);
    $statement->bindValue(':question', $_POST['question'], PDO::PARAM_STR);
    $statement->bindValue(':atype', $_POST['atype'], PDO::PARAM_STR);
    $statement->bindValue(':answer', $_POST['answer'], PDO::PARAM_STR);
    $statement->bindValue(':email', $_COOKIE['user'], PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
  }
}

?>

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
  <link rel="stylesheet" href="styles/accountpage.css" />
  <link rel="stylesheet" href="styles/navbar.css" />
  <link rel="stylesheet" href="styles/footer.css" />
</head>

<body class="main-content">
  <?php include("header.html") ?>
  <div class="container">
    <div class="row">
      <div class="col-lg d-flex justify-content-center text-center column">
        <img style="margin: auto" src="img/image-placeholder.png" width="250" height="250" alt="placeholder" />
        <div class="accountbox">
          <h4 class="jeoph">Account Information</h4>
          <form action="accountpage.php" method="post" style="margin:2px">
            <div class="block">
              <label><b>Email:</b></label>
              <input type="text" placeholder="<?php echo $_COOKIE['user'] ?>" readonly="readonly" />
            </div>
            <div class="block">
              <label><b>First Name:</b></label>
              <input type="text" name="fname" placeholder="<?php echo $_COOKIE['fname'] ?>" required />
            </div>
            <div class=" block">
              <label><b>Last Name:</b></label>
              <input type="text" name="lname" placeholder="<?php echo $_COOKIE['lname'] ?> required />
            </div>
            <input type=" hidden" name="form" value="AccountForm" />
              <input type="submit" name=button value="Update Account" class="btn btn-secondary" />
              <input type="submit" name=button value="Delete Account" class="btn btn-secondary" />
          </form>
        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="accountbox">
          <h4 class="jeoph">Your Games</h4>
          <div class="game">
            <label><b>CS 2110</b></label>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>CS 4640</b></label>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>Famous Pirates</b></label>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
          <div class="game">
            <label><b>Buildings at UVA</b></label>
            <a href="#">
              <img src="img/play_button.png" height="25" width="25" />
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="myquestbox">
          <h4 class="jeoph">Your Questions</h4>
          <?php

          $sql = "SELECT id, question,answer FROM Questions WHERE email = :email";
          $stuff = $pdo->prepare($sql);
          $stuff->bindValue(':email', $_COOKIE['user'], PDO::PARAM_STR);
          $stuff->execute();
          $i = 0;
          if (!empty($stuff)) {
            while ($row = $stuff->fetch()) {
              $i++;
              $question = $row["question"];
              $answer = $row["answer"];
          ?>
              <button class='accordion'><?php echo $question . " " . $i; ?> "</button>
              <div class='panel'>
                <p> <?php echo $answer; ?> ---- <a href="/delete.php?id=<?php echo $i; ?>">Delete</a></p>
              </div>
          <?php
            }
          } else {
            echo "You have not submitted any question!";
          }

          ?>
        </div>
      </div>
      <div class=" col-lg d-flex justify-content-center text-center column">
        <div class="accountbox">
          <h4 class="jeoph">Add Questions</h4>
          <form action="accountpage.php" method="post" style="margin:2px">
            <input type="text" name="question" id="question" placeholder="Question" required /> <br />
            <select id="answerselect" class="answerselect" name="atype" onchange="answerSelect()" required>
              <option value="" disabled selected>Select Answer Type</option>
              <option value="Multiple Choice">Multiple Choice</option>
              <option value="Free Response">Free Response</option>
            </select>
            <textarea rows="5" columns="20" name="answer" id="answer" placeholder="Select Answer Type First" required></textarea>
            <input type="hidden" name="form" value="QuestionForm" />
            <input type="submit" value="Submit Question" class="btn btn-secondary" />
          </form>
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