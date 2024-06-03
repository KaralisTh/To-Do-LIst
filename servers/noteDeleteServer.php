<?php
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/databaseFunctions.php');
startSession();

if (isRequestMethodPost()) {
    $user_id = $_SESSION['loggedUserId'];

    if (isset($_POST['note_id'])) {
        $note_id = $_POST['note_id'];

        $deleteNoteSql = "DELETE FROM notes WHERE user_id = $user_id AND note_id = $note_id";
        executeQuery($deleteNoteSql);
        echo "Η σημειωση διαγραφηκε επιτυχως!";
        redirectTo("../notesDelete.php");
    } else {
        echo "Ο αριθμος id της δημειωσης δε βρεθηκε";
        redirectTo("../notesDelete.php");
    }
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>
