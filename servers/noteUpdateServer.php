<?php
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/databaseFunctions.php');

startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    $noteData = [
        'title'       => $_POST['title'],
        'content' => $_POST['content'],
        'created_at'  => date("Y-m-d H:i:s"),
    ];

    $updates = [];
    foreach ($noteData as $field => $value) {
        $updates[] = "$field = '$value'";
    }
    $updatesStr = implode(", ", $updates);

    $noteUpdateSql = 
    "UPDATE notes 
    SET $updatesStr 
    WHERE user_id = $user_id AND note_id = {$_POST['note_id']}";
    executeQuery($noteUpdateSql);
    redirectTo("../notesUpdate.php");
} else { 
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
