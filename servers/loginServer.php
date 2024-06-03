<a href="../../ProjectPHP/">Main Page</a>
<br> <br>

<?php 
require('../functions/userFunctions.php'); 
require('../functions/genericFunctions.php'); 
require('../functions/databaseFunctions.php'); 

startSession();

if(isRequestMethodPost()) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if(isset($username) && isset($password)) {
        $sql = "SELECT username , user_id
                FROM users
                WHERE username = '{$username}' AND password = '{$password}'";

                // echo  ($sql) ; exit();
                
        $data = selectFromDbSimple($sql);

        if(!empty($data)) {
            foreach($data as $userCredentials) {

                $loginOutcome = logUserIn($userCredentials['username'],$userCredentials['user_id']);

                if($loginOutcome) {
                    redirectTo("../mainPage.php");
                } else {
                    echo "Another user is already logged in!";
                }
            }
        } else {
            echo "User not found!"  . "<br>";
        }
    }
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>