<?php

session_start(); 

include "../db_connect.php"; 
include "../userexists.php";

if (isset($_SESSION['uid']) && isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
 $sql = "SELECT * FROM users";
 $result = mysqli_query($conn, $sql);
 
 if ($result->num_rows > 0) {
    echo "<table class='admin'> <thead>
    <tr>
    <th>UID</th>
    <th>USERNAME</th>
    <th>ACTION</th>
    </tr>
    </thead>
    <tbody>";
    
    while($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>";
        echo "<td>".$row['uid']."</td>";
        echo "<td>".$row['username']."</td>";
        echo '<td><a href="deleteuser.php?uid=' . $row['uid'] . '">delete user</a></td>';
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
  }
}
?>