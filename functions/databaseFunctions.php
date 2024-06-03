<?php

function defaultConnection() {
    $serverName = "localhost";
    $userName   = "root";
    $password   = "";
    $dbName = "proj_db";

    $conn = new mysqli($serverName , $userName , $password , $dbName) ; 

    if ($conn->connect_error) {
        die("Ανεπιτυχης συνδεση: " . $conn->connect_error) ; 
    }

    return $conn ; 
}
function checkEmptyInput($parameter, $message = '') {
    if(empty($parameter)) {
        echo $message . "<br>";
        
        return true;
    }
}

function exitOnEmptyInput($parameter, $message = ''): void {
    if(empty($parameter)) {
        exit($message);
    }
}

function selectFromDbSimple($sql):array 
{
    exitOnEmptyInput($sql, "Empty 'select' query in line: " . __LINE__);

    $conn   = defaultConnection();
    $result = $conn->query($sql);
    $data   = [];

    // echo $sql . "<br>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function executeQuery($sql) {
    exitOnEmptyInput($sql, "Empty query in line: " . __LINE__);

    $conn = defaultConnection();

    $result = $conn->query($sql);

    // if(empty($result)) {
    //     echo "Query execution failure!" . "<br>" . $sql . "<br>";
    // } else {
    //     echo "Query execution success!" . "<br>" . $sql . "<br>";
    // }

    $conn->close();
}
function selectFromDb($sql) {
    exitOnEmptyInput($sql, "Empty 'select' query in line: " . __LINE__);

    $conn   = defaultConnection();
    $result = $conn->query($sql);
    $data   = [];

    // echo $sql . "<br>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}
?>