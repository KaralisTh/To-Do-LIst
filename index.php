<?php
require('functions/databaseFunctions.php');
require('functions/userFunctions.php');
require('functions/genericFunctions.php');

startSession();

if (isset($_SESSION['loggedUserId'])) {
    redirectTo("mainPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLoginPage.css">
    <title>Login</title>
</head>
<body>
    <form action="servers/loginServer.php" method="POST">
        <blockquote>
            Imagine a world without priorities... a total disaster.
            <br>Make the difference with your To Do Karalist.
        </blockquote>
        <div class="loginform">
            <div class="username">
                <label>Username
                    <input type="text" id="username" name="username" placeholder="Προσθέστε Username" required>
                </label>
            </div><br/>
            <div class="password">
                <label>Password
                    <input type="password" id="password" name="password" placeholder="Βάλτε έναν καλό κωδικό" required>
                </label>
            </div><br/>
            <div class="register-link">
                Δεν έχετε λογαριασμό; <a href="register.php" class="connectButton">Εγγραφείτε εδώ</a>
            </div>
            <div class="submitB">
                <button type="submit" class="connectButton">Σύνδεση</button>
            </div>
        </div>
    </form>
</body>
</html>