<html>

<head>
    <meta charset="UTF-8">

    <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Daniel Collins & Grady Roberts">
    <meta name="description" content="Course Project">

    <title>UVA Jeopardy</title>

    <!--Reset CSS before loading bootstrap-->
    <link rel="stylesheet" href="styles/reset.css" />

    <!-- 3. link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- 3. Style Sheet for NavBar -->
    <link rel="stylesheet" href="styles/navbar.css" />

    <!-- 3. Style Sheet for Login Page -->
    <link rel="stylesheet" href="styles/loginpage.css" />
    <link rel="stylesheet" href="styles/home.css" />
</head>



<body class="main-content">

<?php
    header("Location: https://cs3250-jeopardy.uk.r.appspot.com/homepage.php", true, 303);
?>

    <?php session_start(); ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <div>
        <img class="shown" src="https://bloximages.newyork1.vip.townnews.com/newsadvance.com/content/tncms/assets/v3/editorial/1/4d/14d176be-bd87-5932-8e49-a36d93dbb07e/5122aa284763b.preview-620.png?crop=452%2C452%2C84%2C0&resize=1200%2C1200&order=crop%2Cresize">
        <h1>Jeopardy!</h1>
        <div class="interior">
            <h4>Have an account already?</h4>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="email" name="loginemail" id="loginemail" placeholder="Email" required /> <br />
                <input type="password" name="loginpwd" id="loginpwd" placeholder="Password" required /> <br />
                <input type="submit" value="Log In" class="btn btn-secondary" />
            </form>
        </div>
        <div class="interior">
            <h4>Create a new account!</h4>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="fname" placeholder="First Name" required /> <br />
                <input type="text" name="lname" placeholder="Last Name" required /> <br />
                <input type="email" name="email" placeholder="Email" required /> <br />
                <input type="password" name="pwd1" placeholder="Password" required /> <br />
                <input type="password" name="pwd2" placeholder="Confirm Password" required /> <br />
                <input type="submit" value="Register Account" class="btn btn-secondary" />
            </form>
        </div>
    </div>

    <?php
    // Connect to the DB
    require('connectdb.php');
    ?>

    <?php
    global $pdo;
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
                setcookie('fname', $result['fname'], time()+3600);
                setcookie('lname', $result['lname'], time()+3600);
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

</body>

</html>