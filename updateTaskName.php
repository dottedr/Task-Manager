<?php 

include_once 'Database.php';

if(isset($_POST['name'])&&isset($_POST['id'])){
    $name = trim($_POST['name']);
    $id = $_POST['id'];
    
    try {
        $updateQuery = " UPDATE task SET name = :name "
                . "WHERE id = :id";
         
        $statement = $conn->prepare($updateQuery);
        $statement->execute(array(":name"=>$name, ":id"=>$id));
        
        if ($statement->rowCount() === 1){
            echo " Task updated";
        }
        else{
            echo "Nothing has changed";
        }
        
    } catch (PDOException $ex) {
        echo 'An error occurred'.$ex->getMessage();
    }
}