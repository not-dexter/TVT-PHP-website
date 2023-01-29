<?php

session_start();

include "db_connect.php";

if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
    $sql = 'SELECT uid FROM users WHERE uid = "' . $_SESSION['uid'] . '"';
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
            
        session_unset();

        session_destroy();

        header('Location: index.php');
        exit();
    }
}
?>