<?php 

session_start();
include "db_connect.php";   
include "userexists.php";
if (isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['admin'])) {

?>
<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        if(localStorage.getItem("welcomed") != "true") {
            $("#welcometext").hide().fadeIn(1000);
            localStorage.setItem("welcomed", "true");
        }
    });
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
</style>
</head>

<body>

<div class="background-image"></div>


    <div class="sidenav">
        
    <a id="home" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;HOME</a>
    <a id="chat" href="index.php?tab=chat"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;CHAT</a>
    <a id="users" href="index.php?tab=userlist"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;USERS</a>
    <a id="profile" href="profile.php?uid=<?php echo $_SESSION['uid'];?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo strtoupper($_SESSION['username']); ?></a>
    <?php if ($_SESSION['admin'] == 1){    ?>
    <a id="admin" href="adm/admin.php"><i class="fa fa-lock" aria-hidden="true"></i> ADMIN</a>
    <?php } ?>
    <a href="logout.php" id="logout" style="position: absolute; bottom: 0; width: 100%"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>  
    <button id="menubutton"><i class='fa fa-arrow-left' aria-hidden='true'></i></button>
    </div>

    <div class="content">
    <script>
        let elementClicked = false;

        if (localStorage.getItem("menu-state") === "closed" && elementClicked == false) {
                const menu = document.querySelector(".sidenav");
                const content = document.querySelector(".content");
                menu.classList.toggle("toggle");
                content.classList.toggle("toggle");
                document.getElementById('home').innerHTML = "<i class='fa fa-home' aria-hidden='true'></i>";
                document.getElementById('chat').innerHTML = "<i class='fa fa-comment' aria-hidden='true'></i>";
                document.getElementById('users').innerHTML = "<i class='fa fa-users' aria-hidden='true'></i>";
                document.getElementById('profile').innerHTML = "<i class='fa fa-user' aria-hidden='true'></i>";
                <?php if ($_SESSION['admin'] == 1){    ?>
                document.getElementById('admin').innerHTML = "<i class='fa fa-lock' aria-hidden='true'></i>";
                <?php } ?>
                document.getElementById('logout').innerHTML = "<i class='fa fa-sign-out' aria-hidden='true'></i>";
                document.getElementById('menubutton').innerHTML = "<i class='fa fa-arrow-right' aria-hidden='true'></i>";
                elementClicked = true;
            }


           document.getElementById('menubutton').addEventListener("click", () => {
                const menu = document.querySelector(".sidenav");
                const content = document.querySelector(".content");
                menu.classList.toggle("toggle");
                content.classList.toggle("toggle");
                if (!elementClicked) {
                    document.getElementById('home').innerHTML = "<i class='fa fa-home' aria-hidden='true'></i>";
                    document.getElementById('chat').innerHTML = "<i class='fa fa-comment' aria-hidden='true'></i>";
                    document.getElementById('users').innerHTML = "<i class='fa fa-users' aria-hidden='true'></i>";
                    document.getElementById('profile').innerHTML = "<i class='fa fa-user' aria-hidden='true'></i>";
                    <?php if ($_SESSION['admin'] == 1){    ?>
                    document.getElementById('admin').innerHTML = "<i class='fa fa-lock' aria-hidden='true'></i>";
                    <?php } ?>
                    document.getElementById('logout').innerHTML = "<i class='fa fa-sign-out' aria-hidden='true'></i>";
                    document.getElementById('menubutton').innerHTML = "<i class='fa fa-arrow-right' aria-hidden='true'></i>";
                    localStorage.setItem("menu-state", "closed");
                    elementClicked = true;
                }
                else
                {
                   
                    document.getElementById('home').innerHTML = "<i class='fa fa-home' aria-hidden='true'></i>&nbsp;HOME";
                    document.getElementById('chat').innerHTML = "<i class='fa fa-comment' aria-hidden='true'></i>&nbsp;CHAT";
                    document.getElementById('users').innerHTML = "<i class='fa fa-users' aria-hidden='true'></i>&nbsp;USERS";
                    document.getElementById('profile').innerHTML = "<i class='fa fa-user' aria-hidden='true'></i>&nbsp;<?php echo strtoupper($_SESSION['username']); ?>";
                    <?php if ($_SESSION['admin'] == 1){    ?>
                    document.getElementById('admin').innerHTML = "<i class='fa fa-lock' aria-hidden='true'></i>&nbsp;ADMIN";
                    <?php } ?>
                    document.getElementById('logout').innerHTML = "<i class='fa fa-sign-out' aria-hidden='true'></i>&nbsp;LOGOUT";
                    document.getElementById('menubutton').innerHTML = "<i class='fa fa-arrow-left' aria-hidden='true'></i>";

                    localStorage.setItem("menu-state", "opened");
                    elementClicked = false;
                }
           });


        </script>    
        <?php
            $uid = $_GET['uid'];
             $sql = 'SELECT * FROM users WHERE uid = "' . $_GET['uid'] . '"';
             $result = mysqli_query($conn, $sql);
             
             if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
                    echo "<h1>" . $row['username'] ."</h1>";      

                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1 && $_SESSION['uid'] != $row['uid']) { 
                        echo '<a href="adm/deleteuser.php?uid=' . $row['uid'] . '">Delete User';
                        echo '</a>';
                    }
                }
            }
 ?>
    </div>

</body>
</html>
<?php
} 
else
    header("Location: index.php");
?>