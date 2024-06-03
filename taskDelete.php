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
$sql_tasks_in_progress = "SELECT task_id, title, description, priority, status FROM tasks WHERE user_id = $user_id AND status = 'Σε Εξέλιξη'";
$tasks_in_progress = selectFromDbSimple($sql_tasks_in_progress);
$sql_done_tasks = "SELECT task_id, title, description, priority, status FROM tasks WHERE user_id = $user_id AND status = 'Done'";
$done_tasks = selectFromDbSimple($sql_done_tasks);
$sql_tasks = "SELECT task_id, title, description,priority,status FROM tasks WHERE user_id = $user_id";
$tasks = selectFromDbSimple($sql_tasks);
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

<form action="servers/taskDeleteServer.php" method="POST"> 
    <div class="task_id">
        <label for="task_id">Επιλέξτε εργασία για διαγραφη:</label>
        <select name="task_id" id="task_id">
            <?php
            foreach ($tasks as $task) {
                echo '<option value="' . $task['task_id'] . '">' . $task['title'] . '</option>';
            }
            ?>
        </select>
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
    </div>

    <div class="submitB"> 
        <button type="submit" name="delete_task" class="deleteButton">Διαγραφή Εκκρεμότητας</button>
    </div>
</form>
</body>
</html>
