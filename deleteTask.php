<?php 

include_once 'Database.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    
    try {
        $deleteQuery = "DELETE FROM task WHERE id = :id";
         
        $statement = $conn->prepare($deleteQuery);
        $statement->execute(array(":id"=>$id));
        
        if ($statement){
            echo " Task deleted";
        }
        
    } catch (PDOException $ex) {
        echo 'An error occurred'.$ex->getMessage();
    }
}
