<br> <br>

<?php 
require('functions/userFunctions.php'); 
require('functions/genericFunctions.php'); 
require('functions/databaseFunctions.php'); 

startSession();

logUserOut();
redirectTo("login.php")
?>