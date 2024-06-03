<?php
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/databaseFunctions.php');

startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    $noteData = [
        'title'       => $_POST['title'],
        'content'     => $_POST['content'],
        'created_at'  => date("Y-m-d H:i:s"),
        'user_id'     => $user_id,
    ];

    // Insert note into notes table
    $fields = implode(", ", array_keys($noteData));
    $values = "'" . implode("', '", $noteData) . "'";
    $noteInsertSql = "INSERT INTO notes ({$fields}) VALUES ({$values})";
    executeQuery($noteInsertSql);
    redirectTo("../notesCreate.php");
}
 else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>
