<?php

session_start(); 

include "../db_connect.php"; 
include "../userexists.php";

if (isset($_SESSION['uid']) && isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
 $sql = 'DELETE FROM users WHERE uid = "' . $_GET['uid'] . '"';
 $result = mysqli_query($conn, $sql);
 header("Location: admin.php?tab=userlist");
 exit();
}

?>