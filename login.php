<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" >
<link rel="stylesheet" href="css/styleLoginPage.css">
</head>
<?php
require('functions/databasefunctions.php');
require('functions/userFunctions.php');
require('functions/genericFunctions.php');
startSession();
?>
<body>
<form action="servers/loginServer.php" method="POST"> 
<blockquote>
        Imagine a world without priorities... a total disaster. 
        <br>Make the difference with your To Do Karalist.
</blockquote>

<div class="loginform">
    <div class="username">
        <label>Username
            <input type="text" id="username" name="username" placeholder="Προσθεσε Username">
        </label>
    </div><br/>

    <div class="password">
        <label>Password
             <input type="password" id="password" name="password" placeholder="Βαλε ενα καλο κωδικο">
        </label>
    </div><br/>

    <div class="register-link">
         Δεν έχετε λογαριασμό; <a href="register.php"class="connectButton">Εγγραφείτε εδώ </a>
    </div> 
    <div class="submitB">
    <button type="submit" class="connectButton">Συνδεση</button>
    </div> 
</div>
</form>
</body>
