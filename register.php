<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" >
<link rel="stylesheet" href="css/styleRegisterPage.css">
</head>

<body>
<div class="navbar">
    <a href="index.php">Log in</a>
    <a href="logout.php">Log out</a>
</div>
<blockquote>
        Imagine a world without priorities... a total disaster. 
        <br>Make the difference with your To Do Karalist.
</blockquote>

<form action="servers/createUserServer.php" method="POST" enctype="multipart/form-data"> <div class="registerForm">
    <div class="username">
        <label>User Name
            <input type="text" id="username" name="username" placeholder="Ονομα χρηστη" required>
        </label>
    </div>
<br/>
    <div class="password">
        <label>Password
            <input type="password" id="password" name="password" placeholder="Κωδικος" required>
        </label>
    </div>
<br/>
    <div class="email">
        <label>Email
            <input type="text" id="email" name="email" placeholder="email">
        </label>
    </div>
<br/>
    <div class="submitB">
        <button type="submit" name="create_user" class="createButton">Δημιουργία Χρήστη</button></form>
    </div>
</div>
</body>