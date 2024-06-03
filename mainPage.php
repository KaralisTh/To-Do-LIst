<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleMainPage.css">
</head>
<?php
require('functions/databaseFunctions.php');
require('functions/userFunctions.php');
require('functions/genericFunctions.php');
startSession();
showLoggedUser();
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
<div class="create-task-button">
    <a href="taskCreate.php" class="create-task-button">Tasks</a>
    <a href="notesCreate.php" class="create-notes-button">Notes</a>
</div>
<h1>ΜΕΓΑΛΟ ΚΕΙΜΕΝΟ ΓΙΑ ΝΑ ΓΕΜΙΣΩ ΤΟ ΧΩΡΟ ΛΟΓΟ ΑΠΟΤΥΧΙΑΣ ΜΕ ΤΗΝ ΕΙΚΟΝΑ
   </br>
   │*_*│   </br>
 \ _ │ _ / </br>
   \ │ /   </br>
     │     </br>
    / \    </br>
   /___\   </br>
</h1>
</body>
</html>
