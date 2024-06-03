<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" >
    <link rel="stylesheet" href="css/styleNoteCreate.css">
</head>
<?php
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 
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

<form action="servers/noteCreateServer.php" method="POST"> 
    <div class="title">
        <label for="title">Τίτλος Σημείωσης: 
            <input type="text" name="title"><br>
        </label>
    </div>

    <div class="content">
        <label for="content">Περιεχόμενο Σημείωσης: 
            <textarea name="content"></textarea><br>
        </label>        
    </div>

    <div class="submitB">
        <button type="submit" name="create_note" class="createButton">Δημιουργία Σημείωσης</button>
    </div>
    <div class="containera">
        <?php     
         echo '<h2>Σημειωσεις</h2>';
        foreach ($notes as $note) {
            echo '<p>' . 'Εδω προβαλεται η σημειωση με τιτλο: ' . $note['title'] . ' και περιεχομενο : ' . $note['content'] . '</p>';
        }
        ?>
        <a href="notesUpdate.php">
        <button type="button" class="editButton">Edit</button>
        </a>
        <a href="notesDelete.php">
        <button type="button" class="deleteButton">Delete</button>
        </a> 
   </div>
</form>
</body>