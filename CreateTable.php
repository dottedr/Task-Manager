<?php
include_once 'Database.php';

$table = "CREATE TABLE IF NOT EXISTS task
          (
              id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(35) NOT NULL UNIQUE,
              description VARCHAR(255) NOT NULL,
              status VARCHAR(25) NOT NULL DEFAULT 'Not completed',
              created_at TIMESTAMP 
          )";

try{
    global $conn;
    $conn->query($table);
    echo "<br>Table created";
}catch (PDOException $ex){
    echo "<br>An error occurred ".$ex->getMessage();
}

return $conn->query($table);