<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" >
<link rel="stylesheet" href="css/styleUserUpdate.css">
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

<div class="userUpdate">
    <form action="servers/updateUserServer.php" method="POST"> 
    <div class="password">
        <label>Password
        <input type="password" id="password" name="password" placeholder="Κωδικος" required>
        </label>
    </div>
    <br/>
    <div class="email">
        <label>email
        <input type="text" id="email" name="email" placeholder="email">
        </label>
    </div>
        <br/>
    <div class="submitB">
        <button type="submit" name="update_user" class="editButton">Ενημερωση</button></form>
    </div>
</div>
</body>
