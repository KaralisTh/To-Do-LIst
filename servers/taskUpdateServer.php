<?php 
require('../functions/userFunctions.php'); 
require('../functions/genericFunctions.php'); 
require('../functions/databaseFunctions.php'); 

startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];
    $sql = "SELECT task_id, title FROM tasks WHERE user_id = $user_id";
    $tasks = selectFromDbSimple($sql);

    $taskData = [
        'title'       => $_POST['title'],
        'description' => $_POST['description'],
        'priority'    => $_POST['priority'],
        'status'      => isset($_POST['status']) ? $_POST['status'] : 'Σε Εξέλιξη',
        'created_at'  => date("Y-m-d H:i:s"),
    ];

    $updates = [];
    foreach ($taskData as $field => $value) {
        $updates[] = "$field = '$value'";
    }
    $updatesStr = implode(", ", $updates);

    $taskUpdateSql = 
    "UPDATE tasks 
    SET $updatesStr 
    WHERE user_id = $user_id AND task_id = {$_POST['task_id']}";
    executeQuery($taskUpdateSql);
    redirectTo("../taskUpdate.php");
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
