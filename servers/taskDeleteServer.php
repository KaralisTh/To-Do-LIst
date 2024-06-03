<?php
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/databaseFunctions.php');
startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    if (isset($_POST['task_id'])) {
        $task_id = $_POST['task_id'];

        $deleteTaskSql = "DELETE FROM tasks WHERE user_id = $user_id AND task_id = $task_id";
        executeQuery($deleteTaskSql);
        echo "Η εκκρεμοτητα διαγραφηκε επιτυχως";
        redirectTo("../taskDelete.php");
    } else {
        echo "Ο αριθμος id της εκκρεμοτητας δε βρεθηκε.";
        redirectTo("../taskDelete.php");
    }
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>
