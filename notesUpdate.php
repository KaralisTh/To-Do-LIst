<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" >
    <link rel="stylesheet" href="css/styleNoteUpdate.css">
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

<form action="servers/noteUpdateServer.php" method="POST"> 
    <div class="note_id">
        <label for="note_id">Επιλέξτε σημειωση για ενημέρωση:</label>
        <select name="note_id" id="note_id">
        <?php
        foreach ($notes as $note) {
            echo '<option value="' . $note['note_id'] . '">' . $note['title'] . '</option>';
        }
        ?>
    </select>
    </div>

    <div class="title">
        <label for="title">Ενημερωση Τιτλου:</label>
        <input type="text" name="title"><br>
    </div>

    <div class="content">
        <label for="content">Ενημερωση Περιεχομενου:</label>
        <input type="text" name="content"><br>
    </div>

    <div class="submitB">
        <button type="submit" name="update_note" class="editButton">Ενημέρωση Σημείωσης</button>
    </div>
    <div class="containera">
        <?php     
         echo '<h2>Σημειωσεις</h2>';
        foreach ($notes as $note) {
            echo '<p>' . 'Εδω προβαλεται η σημειωση με τιτλο: ' . $note['title'] . ' και περιεχομενο : ' . $note['content'] . '</p>';
        }
        ?>
    </div>
    <a href="notesUpdate.php">
    <button type="button" class="editButton">Edit</button>
    </a><a href="notesDelete.php">
    <button type="button" class="deleteButton">Delete</button>
    </a>

</form>
</body>
