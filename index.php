<?php
switch(@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/homepage.php':
        require('src/homepage.php');
        break;
    case '/loginpage.php':
        require('src/loginpage.php');
        break;
    case '/accountpage.php':
        require('src/accountpage.php');
        break;
    case '/allgames.php':
        require('src/allgames.php');
        break;
    case '/logout.php':
        require('src/logout.php');
    default:
        http_response_code(404);
        exit('Not Found');
}
?>