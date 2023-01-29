<?php
session_start();

include "db_connect.php";    
include "userexists.php";

$conn->autocommit(FALSE);
if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
 $message = $_GET['msg'];
 $time = time();
 $uid = $_SESSION['uid'];
 $push = "INSERT INTO chat (uid,message,time) VALUES ('$uid','$message','$time')";
 $conn->query($push);

 if (!$conn -> commit()) {
    echo "Commit transaction failed";
    exit();
  }
}
?>