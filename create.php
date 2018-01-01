<?php 

include_once 'Database.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $deadline = $_POST['deadline'];
    try {
        $createQuery = " INSERT INTO task(name, created_at, deadline) "
                . "VALUES (:name, now(),:deadline)";
        
        $statement = $conn->prepare($createQuery);
        $statement->execute(array(":name"=>$name, ":deadline"=>$deadline));
        
        if ($statement){
            echo " Record Inserted";
        }
        
    } catch (PDOException $ex) {
        echo 'An error occurred'.$ex->getMessage();
    }
}