<?php 

include_once 'Database.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    
    try {
        $completedQuery = "UPDATE task SET isDone='1' WHERE id = :id";
         
        $statement = $conn->prepare($completedQuery);
        $statement->execute(array(":id"=>$id));
        
        if ($statement){
            echo '<p>Task completed.</p>';
            
        }
        
    } catch (PDOException $ex) {
        echo 'An error occurred'.$ex->getMessage();
    }
}
