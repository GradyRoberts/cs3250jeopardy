<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: loginpage.php");
}
?>
<?php
require('connectdb.php');
global $pdo;

$id = $_GET['id']; // get id through query string

$query = "DELETE FROM Questions
      WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

if ($statement) {
    header("location: accountpage.php"); // redirects to all records page
} else {
    echo "Error Deleting Question";
}
?>