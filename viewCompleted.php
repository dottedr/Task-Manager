<?php
include_once 'Database.php';

try {

    $readQuery = "SELECT *  FROM task WHERE isDone = '1'";
    $statement = $conn->query($readQuery);
    
    while ($task = $statement->fetch(PDO::FETCH_OBJ)){
        
        $deadline = strftime("%b %d, %Y", strtotime($task->deadline));
        $output = " <tr>

                <td style=\"width: 80%;\"> <div class='editable' onclick = \"makeElementEditable(this)\" 
                onblur = \"updateTaskName(this,'{$task->id}')\">$task->name</div></td>
                
                
                <td><div>$deadline</div></td>    
                
                <td style=\"width: 5%;\">
                    <button type=\"button\" class=\"btn btn-sm\" onclick=\"deleteTask('{$task->id}')\">
                        <i class=\"fa fa-times\"></i>
                    </button>
                </td>
            </tr>";
        echo $output;
    }
    
} catch (PDOException $ex) {
    
}