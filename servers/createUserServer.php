<a href="../../ProjectPHP/">Main Page</a>
<br> 
<?php
require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/userFunctions.php');
startSession();

if(isRequestMethodPost()) {
    $userData = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email'    => $_POST['email'],
       
    ];
    $username = $userData['username'];
    
    $sql = "SELECT user_id
            FROM users
            WHERE username = '{$username}'";

    $data = selectFromDbSimple($sql);

    

    if(!empty($data)) {
        exit("There is already a user with username: $username");
    }

    $fields = "";
    $values = "";

    foreach($userData as $field => $value) {
        if(!empty($value)) {
            $fields .= "$field, ";
            $values .= "'$value', ";
        }
    }
    
    $fields = rtrim($fields, ', ');
    $values = rtrim($values, ', ');


    $sql = "INSERT INTO users ({$fields}) 
            VALUES ({$values})";


    executeQuery($sql);
    redirectTo("../index.php");
} else {
    setError("Προσπάθησε να στείλει δεδομένα χωρίς τη μέθοδο 'Post'!");
    redirectTo("../errorPage.php");
}
?>
