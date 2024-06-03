<?php

function existsActiveUserSession() 
{
    return session_status() === 2;
}

function existsLoggedUser()
{
    return isset($_SESSION['loggedUserName']) && isset($_SESSION['loggedUserId']);
}


function showLoggedUser() 
{    
    if(existsLoggedUser()) {
        echo "Logged in user: " . $_SESSION['loggedUserName'] ;
    } else {
        echo "No logged in user!"  . "<br>" . "<br>";
    }
}


function logUserIn($userName, $User_id)
{
    if (!existsLoggedUser()) {
        $_SESSION['loggedUserName'] = $userName;
        $_SESSION['loggedUserId'] = $User_id; 

        return true;
    }

    return false;
}


// Αρχείο: functions/userFunctions.php

function logUserOut() {
    // Αρχίστε τη συνεδρία, αν δεν έχει ήδη αρχίσει.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Διαγράψτε όλα τα session variables.
    $_SESSION = array();

    // Αν θέλετε να καταστρέψετε το session cookie επίσης, μπορείτε να το κάνετε:
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Καταστρέψτε το session.
    session_destroy();
    
    // Ανακατεύθυνση στη σελίδα index.php.
    header("Location: index.php");
    exit();
}

function insertUser($userData) {
    $conn = defaultConnection();

    $fields = implode(", ", array_keys($userData));
    $values = "'" . implode("', '", $userData) . "'";

    $sql = "INSERT INTO users ({$fields}) VALUES ({$values})";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}