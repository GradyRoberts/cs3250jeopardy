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
          <h4>Account Information</h4>
          <form action="accountpage.php" method="post" style="margin:2px">
            <div class="block">
              <label><b>Email:</b></label>
              <input type="text" placeholder="stuff@stuff.com" readonly="readonly" />
            </div>
            <div class="block">
              <label><b>First Name:</b></label>
              <input type="text" />
            </div>
            <div class=" block">
              <label><b>Last Name:</b></label>
              <input type="text" />
            </div>
            <div class="block">
              <label><b>Password:</b></label>
              <input type="text" />
            </div>
          </form>
          <p> </p>
          <p> </p>
          <p> </p>
          <input type="hidden" value="AccountForm" />
          <input type="submit" value="Update Account" class="btn btn-secondary" />
          <input type="submit" value="Delete Account" class="btn btn-secondary" />

        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="accountbox">
          <h4>Your Games</h4>
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
          <h4>Your Questions</h4>
          <button class="accordion">Question 1</button>
          <div class="panel">
            <p>Answer 1</p>
          </div>
          <button class="accordion">Question 2</button>
          <div class="panel">
            <p>Answer 2</p>
          </div>
          <button class="accordion">Question 3</button>
          <div class="panel">
            <p>Answer 3</p>
          </div>
          <button class="accordion">Question 4</button>
          <div class="panel">
            <p>Answer 4</p>
          </div>
        </div>
      </div>
      <div class="col-lg d-flex justify-content-center text-center column">
        <div class="accountbox">
          <h4>Add Questions</h4>
          <form action="accountpage.php" method="post" style="margin:2px">
            <input type="text" name="question" id="question" placeholder="Question" required /> <br />
            <select id="answerselect" class="answerselect" name="answerselect" onchange="answerSelect()" required>
              <option value="" disabled selected>Select Answer Type</option>
              <option value="Multiple Choice">Multiple Choice</option>
              <option value="Free Response">Free Response</option>
            </select>
            <textarea rows="5" columns="20" name="answer" id="answer" placeholder="Select Answer Type First" required></textarea>
            <input type="hidden" value="QuestionForm" />
            <input type="submit" value="Submit Question" class="btn btn-secondary" />
          </form>
          <br />

        </div>
      </div>
    </div>
  </div>
  <?php include("footer.html") ?>

  <?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: loginpage.php");
  }
  ?>

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

  <?php
  //LOG IN HANDLER
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (sizeof($_POST) == 2) { //Login Request
      $query = "SELECT * FROM Users WHERE email = :email AND password = :password";
      $statement = $pdo->prepare($query);
      $statement->bindValue(':email', $_POST['loginemail'], PDO::PARAM_STR);
      $statement->bindValue(':password', $_POST['loginpwd'], PDO::PARAM_STR);
      $statement->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
      if (!empty($result)) { //There was a user in the table with that email and password
        echo "Login Successful" . "</br>";
        $_SESSION['user'] = $_POST['loginemail']; #Grab their first and last name from the DB and store them in cookies name into cookies for use on the next page
        setcookie('fname', $result['fname'], time() + 3600);
        setcookie('lname', $result['lname'], time() + 3600);
        header('Location: https://cs3250-jeopardy.uk.r.appspot.com/homepage.php');  #Redirects to home page
      } else {
        echo "Incorrect Username or Password" . "</br>";
      }
    } else if (sizeof($_POST) == 5) { //Create Account Request
      echo "Register" . "<br/>";
      if ($_POST["pwd1"] == $_POST["pwd2"]) { //If password and confirmed passwords match
        $query = "SELECT * FROM Users WHERE email = :email";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':email', $_POST['loginemail'], PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        if (empty($result)) { //There is no user in the table with that email 
          $query = "INSERT INTO Users (email, fname, lname, password) VALUES (:email, :fname, :lname, :password)"; //Create User
          $statement = $pdo->prepare($query);
          $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
          $statement->bindValue(':fname', $_POST['fname'], PDO::PARAM_STR);
          $statement->bindValue(':lname', $_POST['lname'], PDO::PARAM_STR);
          $statement->bindValue(':password', $_POST['pwd1'], PDO::PARAM_STR);
          $statement->execute();
          $statement->closeCursor();

          $_SESSION['user'] = $_POST['loginemail']; #Grab their first and last name from the DB and store them in cookies name into cookies for use on the next page
          $_COOKIE['fname'] = $result['fname'];
          $_COOKIE['lname'] = $result['lname'];
          echo "Account Created" . "</br>";
          header('Location: https://cs3250-jeopardy.uk.r.appspot.com/homepage.php');  #Redirects to home page
        } else {
          echo "Account already Exists" . "</br>";
        }
      } else {
        echo "Passwords Do Not Match" . "</br>";
      }
    }
  }
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>