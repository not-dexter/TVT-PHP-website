<?php

session_start(); 

include "db_connect.php";   
include "userexists.php"; 

if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
 $sql = "SELECT message,uid FROM chat";
 $result = mysqli_query($conn, $sql);
 $idx = 0;
 
 if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) { 
      $sql2 = 'SELECT username FROM users WHERE uid = "' . $row['uid'] . '"';
      $name = mysqli_query($conn, $sql2);
      $username = "";

      if (!in_array($row['uid'], array_column($name, 'uid'))) {     
        while($user = mysqli_fetch_assoc($name)) { 
          if($username == "")
           $username = '<a href="profile.php?uid=' . $row['uid'] . '">' . $user['username'] . "</a>";
        }
      }   
      
      if($username == "")
        $username = "*deleted user*";



      if($idx != 0) {
        echo "<hr>";
      }

      echo $username . ": " . $row['message']. "<br>";
      $idx += 1;
    }
  }
}
?>