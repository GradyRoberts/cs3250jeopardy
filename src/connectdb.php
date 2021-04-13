<?php 
    // Connect to the DB
    // use PDO;
    // use PDOException;

    $dbUser = getenv('CLOUDSQL_USER');
    $dbPass = getenv('CLOUDSQL_PASSWORD');
    $dbName = getenv('CLOUDSQL_DB');
    $dbConn = getenv('CLOUDSQL_CONN_NAME');

    $dsn = "mysql:unix_socket=/cloudsql/${dbConn};dbname=${dbName}";
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
    } catch (PDOException $e) {
        echo "Can't connect to db<br/>";
        echo $e->getMessage() . "<br/>";
    }
?>