<?php
require('../functions/databaseFunctions.php');
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');

startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    $userData = [
        'password' => $_POST['password'],
        'email'    => $_POST['email']
    ];

    $fields = "";
    foreach ($userData as $field => $value) {
        if (!empty($value)) {
            $fields .= "$field = '$value', ";
        }
    }
    $fields = rtrim($fields, ', ');

    $sql = "UPDATE users
            SET $fields
            WHERE user_id = $user_id";

    executeQuery($sql);
    redirectTo("../mainPage.php");
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>
