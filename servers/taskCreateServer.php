<?php 
require('../functions/userFunctions.php'); 
require('../functions/genericFunctions.php'); 
require('../functions/databaseFunctions.php'); 
session_start();
startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    $taskData = [
        'title'       => $_POST['title'],
        'priority'    => $_POST['priority'],
        'description' => $_POST['description'],
        'status'      => isset($_POST['status']) ? $_POST['status'] : 'Σε Εξέλιξη',
        'created_at'  => date("Y-m-d H:i:s"),
        'user_id'     => $user_id,
    ];

    // Insert task into tasks table
    $fields = implode(", ", array_keys($taskData));
    $values = "'" . implode("', '", $taskData) . "'";
    $taskInsertSql = "INSERT INTO tasks ({$fields}) VALUES ({$values})";
    executeQuery($taskInsertSql);
    redirectTo("../taskCreate.php");
} else {
    setError("Tried to send data without 'Post' Method!");
    redirectTo("../errorPage.php");
}
?>