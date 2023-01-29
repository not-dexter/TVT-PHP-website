<?php 

session_start();
include "../db_connect.php";    
include "../userexists.php";   
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
<!DOCTYPE html>

<html>
    <head>
        <title>ADMIN</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
    </style>
    </head>
    <body>
        
<div class="background-image"></div>
    <div class="sidenav">
        <a href="admin.php?tab=userlist">USER LIST</a>
        <a href="../index.php" style="position: absolute; bottom: 0; width: 100%">BACK TO INDEX</a>  
        </div>
        <div class="content">
            <h1>admin</h1>
            <div id="users" ></div>
            <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
            <script>
                const xhttp = new XMLHttpRequest();
            
                xhttp.onload = function () {
                    if (document.getElementById("users").innerHTML != this.responseText) {
                        document.getElementById("users").innerHTML = this.responseText;
                    }
                }         
                xhttp.open("GET", "getusers.php");
                xhttp.send(); 
            </script>
        </div>
    </body>
</html>
<?php
} else
    echo "no";
?>