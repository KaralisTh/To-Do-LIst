<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" >
    <link rel="stylesheet" href="css/styleTaskCreate.css">
</head>
<?php
require('functions/databasefunctions.php');
require('functions/userFunctions.php');
require('functions/genericFunctions.php');
session_start(); 
showLoggedUser();
$user_id = $_SESSION['loggedUserId'];
$sql_tasks_in_progress = "SELECT task_id, title, description, priority, status FROM tasks WHERE user_id = $user_id AND status = 'Σε Εξέλιξη'";
$tasks_in_progress = selectFromDbSimple($sql_tasks_in_progress);
$sql_done_tasks = "SELECT task_id, title, description, priority, status FROM tasks WHERE user_id = $user_id AND status = 'Done'";
$done_tasks = selectFromDbSimple($sql_done_tasks);
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

<div class="tasks">
    <form action="servers/taskCreateServer.php" method="POST"> 

        <div class="title">
            <label for= "title ">Τιτλος
            <input type= "text" name= "title" ><br>
            </label>
        </div>
        <div class="description">
            <label for= "description">Περιγραφή 
            <input type= "text" name= "description" ><br>
            </label>       
        </div>
        <div class="priority">
            <label for= "priority">Κατασταση 
                <select name= "priority">
                    <option value = "normal">Κανονική</option>
                    <option value = "urgent">Επείγουσα</option>
                </select>
            </label>     
        </div>
        <div class="submitB"> 
            <button type  = "submit" name= "create_task" class="createButton">Εισαγωγή Εκκρεμότητας</button>
        </div>
    </form>
</div>
<div class="containerb">
    <?php
    echo '<h2>Εκκρεμότητες</h2>';
    echo '<h3>Σε Εξέλιξη</h3>';
    foreach ($tasks_in_progress as $task) {
    echo '<p> Εδω προβαλλεται η εκκρεμοτητα με τιτλο : ' . $task['title'] . ' , περιγραφη: ' . $task['description'] . ' , τιμη  προτεραιότητας: ' . $task['priority'] . ' και τιμη κατάστασης: ' . $task['status'] . '</p>';
    }
    ?>
</div>

<div class="containerc">
    <?php
    echo '<h3>Done</h3>';
    foreach ($done_tasks as $task) {
    echo '<p> Εδω προβαλλεται η εκκρεμοτητα με τιτλο : ' . $task['title'] . ' , περιγραφη: ' . $task['description'] . ' , τιμη  προτεραιότητας: ' . $task['priority'] . ' και τιμη κατάστασης: ' . $task['status'] . '</p>';
    }
    ?>
    <a href="taskUpdate.php">
    <button type="button" class="editButton">Edit</button>
    </a><a href="taskDelete.php">
    <button type="button" class="deleteButton">Delete</button>
    </a>
</body>
