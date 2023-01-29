<?php
 $dbhost = "localhost";
 $dbuser = "shane";
 $dbpass = "12122004";
 $db = "extshane";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 if(!$conn) {
 echo "connection failed";
 }
?>