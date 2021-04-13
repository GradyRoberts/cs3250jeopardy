<?php
function logout() {
    session_destroy();
    header("Location: https://cs3250-jeopardy.uk.r.appspot.com/loginpage.php");
}

logout();
?>