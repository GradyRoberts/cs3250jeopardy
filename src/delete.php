<?php

require('connectdb.php');
global $pdo;

$id = $_GET['id']; // get id through query string

$query = 'DELETE FROM Questions
      WHERE id = :id';
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch();
$statement->closeCursor();
