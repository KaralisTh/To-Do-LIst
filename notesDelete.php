<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleDelete.css">
</head>
<?php
require('functions/databaseFunctions.php');
require('functions/userFunctions.php');
require('functions/genericFunctions.php');
startSession();
showLoggedUser();
$user_id = $_SESSION['loggedUserId'];
$sql_notes = "SELECT note_id, title, content FROM notes WHERE user_id = $user_id";
$notes = selectFromDbSimple($sql_notes);
?>

<body>
<div class="navbar">
    <a href="mainPage.php">Αρχικη</a>
    <a href="taskCreate.php">Tasks</a>
    <a href="notesCreate.php">Notes</a>
    <div class="dropdown3">
        <button class="dropbtn3">User
            <i class="fa fa-caret-down3"></i>
        </button>
        <div class="dropdown3-content">
            <a href="updateUser.php">Ενημέρωση Χρηστη</a>
            <a href="index.php">Συνδεση Χρηστη</a>
            <a href="logout.php">Αποσυνδεση Χρηστη</a>
        </div>
    </div>
</div>
<blockquote>
    Imagine a world without priorities... a total disaster. 
    <br>Make the difference with your To Do Karalist.
</blockquote>

<form action="servers/noteDeleteServer.php" method="POST"> 
    <div class="note_id">
        <label for="note_id">Επιλέξτε σημειωση για διαγραφη:</label>
        <select name="note_id" id="note_id">
            <?php
            foreach ($notes as $note) {
                echo '<option value="' . $note['note_id'] . '">' . $note['title'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="containera">
        <?php
        echo '<h2>Εκκρεμότητες</h2>';
        echo '<h3>Σε Εξέλιξη</h3>';
        foreach ($notes as $note) {
            echo '<p>' . 'Εδω προβαλεται η σημειωση με τιτλο: ' . $note['title'] . ' και περιεχομενο : ' . $note['content'] . '</p>';
        }
        ?>
    </div>

    <div class="submitB"> 
        <button type="submit" name="delete_note" class="deleteButton">Διαγραφή Σημείωσης</button>
    </div>
</form>
</body>
</html>
