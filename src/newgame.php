<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: /loginpage.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="author" content="Daniel Collins & Grady Roberts">
  <meta name="description" content="Course Project">

  <title>UVA Jeopardy</title>

  <link rel="stylesheet" href="styles/reset.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- 3. Style Sheets -->
  <link rel="stylesheet" href="styles/accountpage.css" />
  <link rel="stylesheet" href="styles/allgamespage.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <link rel="stylesheet" href="styles/navbar.css" />
</head>

<body class="main-content">
  <?php include("header.html") ?>

  <div class="container">
    <div class="row">
      <div class="col-md justify-content-center">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-gameinfo-tab" data-toggle="tab" href="#nav-gameinfo" role="tab" aria-controls="nav-gameinfo" aria-selected="true">Game Information</button>
            <button class="nav-link" id="nav-questions-tab" data-toggle="tab" href="#nav-questions" role="tab" aria-controls="nav-questions" aria-selected="false">Add Questions</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div style="padding: 10px" class="tab-pane fade show active" id="nav-gameinfo" role="tabpanel" aria-labelledby="nav-gameinfo-tab">
            <form action="newgame.php" method="POST">
              <div class="mb-3">
                <label for="gameName" class="form-label">Game Name</label>
                <input class="form-control" type="text" name="gamename" id="gameName" required />
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Game Description</label>
                <textarea class="form-control" rows="5" columns="20" name="description" id="description" required></textarea>
              </div>
              <!-- <div class="mb-3">
                <label for="numCats" class="form-label"># of Categories</label>
                <select name="numCats" id="numCats" class="form-select form-select-sm" aria-label="Select number of categories">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option selected value="6">6</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="numQs" class="form-label"># of Questions per Category</label>
                <select name="numQs" id="numQs" class="form-select form-select-sm" aria-label="Select number of questions per category">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option selected value="5">5</option>
                </select>
              </div> -->
              <input type="submit" value="Create Game" class="btn btn-primary" />
            </form>
          </div>

          <div class="tab-pane fade" id="nav-questions" role="tabpanel" aria-labelledby="nav-questions-tab">
            <div class="container">
              <div class="row">
                <div class="col-sm justify-content-center text-center">Category 1</div>
                <div class="col-sm justify-content-center text-center">Category 2</div>
                <div class="col-sm justify-content-center text-center">Category 3</div>
                <div class="col-sm justify-content-center text-center">Category 4</div>
                <div class="col-sm justify-content-center text-center">Category 5</div>
                <div class="col-sm justify-content-center text-center">Category 6</div>
              </div>
              <div class="row">
                <div class="col-sm justify-content-center text-center">$200</div>
                <div class="col-sm justify-content-center text-center">$200</div>
                <div class="col-sm justify-content-center text-center">$200</div>
                <div class="col-sm justify-content-center text-center">$200</div>
                <div class="col-sm justify-content-center text-center">$200</div>
                <div class="col-sm justify-content-center text-center">$200</div>
              </div>
              <div class="row">
                <div class="col-sm justify-content-center text-center">$400</div>
                <div class="col-sm justify-content-center text-center">$400</div>
                <div class="col-sm justify-content-center text-center">$400</div>
                <div class="col-sm justify-content-center text-center">$400</div>
                <div class="col-sm justify-content-center text-center">$400</div>
                <div class="col-sm justify-content-center text-center">$400</div>
              </div>
              <div class="row">
                <div class="col-sm justify-content-center text-center">$600</div>
                <div class="col-sm justify-content-center text-center">$600</div>
                <div class="col-sm justify-content-center text-center">$600</div>
                <div class="col-sm justify-content-center text-center">$600</div>
                <div class="col-sm justify-content-center text-center">$600</div>
                <div class="col-sm justify-content-center text-center">$600</div>
              </div>
              <div class="row">
                <div class="col-sm justify-content-center text-center">$800</div>
                <div class="col-sm justify-content-center text-center">$800</div>
                <div class="col-sm justify-content-center text-center">$800</div>
                <div class="col-sm justify-content-center text-center">$800</div>
                <div class="col-sm justify-content-center text-center">$800</div>
                <div class="col-sm justify-content-center text-center">$800</div>
              </div>
              <div class="row">
                <div class="col-sm justify-content-center text-center">$1000</div>
                <div class="col-sm justify-content-center text-center">$1000</div>
                <div class="col-sm justify-content-center text-center">$1000</div>
                <div class="col-sm justify-content-center text-center">$1000</div>
                <div class="col-sm justify-content-center text-center">$1000</div>
                <div class="col-sm justify-content-center text-center">$1000</div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="col-md justify-content-center text-center" id="questionsList" style="display: none">
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
    </div>
  </div>
  <?php include("footer.html") ?>

  <?php 
    // session_start(); 
    // if (! isset($_SESSION['user'])) {
    //     header("Location: loginpage.php");
    // }
  ?>

  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    // Show and hide answer panels when the question is clicked
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

  <script>
    const gameInfoButton = document.getElementById("nav-gameinfo-tab");
    const addQuestionButton = document.getElementById("nav-questions-tab");
    
    // Hide the questions list when the Game Information tab is active
    gameInfoButton.addEventListener("click", () => {
      console.log("game info tab click event");
      const qList = document.getElementById("questionsList");
      if (qList.classList.contains("active")) {
        qList.classList.remove("active");
        if (qList.style.display === "block") {
          qList.style.display = "none";
        }
      }
    });

    // Show the questions list when the Add Question tab is active
    addQuestionButton.addEventListener("click", () => {
      console.log("question tab click event");
      const qList = document.getElementById("questionsList");
      if (!qList.classList.contains("active")) {
        qList.classList.add("active");
        if (qList.style.display === "none") {
          qList.style.display = "block";
        }
      }
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>