<?php

use Google\Cloud\Firestore\FirestoreClient;

$projectId = getenv('GOOGLE_CLOUD_PROJECT');
$firestore = new FirestoreClient([
    'projectId' => $projectId,
]);

$handler = $firestore->sessionHandler(['gcLimit' => 500]);

session_set_save_handler($handler, true);
session_save_path('sessions');

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
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
?>