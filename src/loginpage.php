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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <div>
        <img class="shown" src="https://bloximages.newyork1.vip.townnews.com/newsadvance.com/content/tncms/assets/v3/editorial/1/4d/14d176be-bd87-5932-8e49-a36d93dbb07e/5122aa284763b.preview-620.png?crop=452%2C452%2C84%2C0&resize=1200%2C1200&order=crop%2Cresize">
        <h1>Jeopardy!</h1>
        <div class="interior">
            <h4>Have an account already?</h4>
            <form method="post">
                <input type="email" name="loginemail" id="loginemail" placeholder="Email" required /> <br />
                <input type="password" name="loginpwd" id="loginpwd" placeholder="Password" required /> <br />
                <input type="submit" value="Log In" class="btn btn-secondary" onclick="return login()" />
            </form>
        </div>
        <div class="interior">
            <h4>Create a new account!</h4>
            <form action="homepage.php" method="get">
                <input type="text" name="createfname" placeholder="First Name" required /> <br />
                <input type="text" name="createlname" placeholder="First Name" required /> <br />
                <input type="email" name="createemail" placeholder="Email" required /> <br />
                <input type="password" name="pwd" placeholder="Password" required /> <br />
                <input type="password" name="pwd" placeholder="Confirm Password" required /> <br />
                <input type="submit" value="Register Account" class="btn btn-secondary" />
            </form>
        </div>
    </div>

    <script>
        function login() {
            var email = document.getElementById("loginemail").value;
            var password = document.getElementById("loginpwd").value;
            if (email == "good@good.com" && password == "123") {
                alert("Login successfully");
                window.location.href = "homepage.php";
                return false;
            } else {
                alert("Invalid username/password using in login");
                return false;
            }
        }
    </script>
</body>

</html>