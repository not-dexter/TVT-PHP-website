<?php 

session_start();
include "db_connect.php";   
include "userexists.php";
if (isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['admin'])) {

?>
<!DOCTYPE html>

<html>

<head>

    <title>Suomen VR Yhdistys</title>
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

    <div id="MyClockDisplay" class="clock" onload="showTime()"></div> 
    <h1 class="centertext" id="welcometext">Suomen VR Yhdistys</h1> 
      <script>



        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";
            
            if(h == 0){
                h = 12;
            }
            
            if(h > 12){
                h = h - 12;
                session = "PM";
            }
            
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            
            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;
            
            setTimeout(showTime, 1000);
            
        }
        showTime();  
    </script>


       <?php if (isset($_GET['tab']) && $_GET['tab'] == "chat") { ?>
    <div class="chat">
     <div id="txtHint" ></div>

    </div>   
    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
    <form name="chatfrm" class="chatsbm" action="postchat.php" method="get" target="dummyframe">
        <input type="text" size="40%" name="msg">
        <input type="submit" value="Send">
    </form>
    <script>
        const xhttp = new XMLHttpRequest();
            
        xhttp.onload = function () {
            if(document.getElementById("txtHint").innerHTML != this.responseText) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                document.getElementById('txtHint').scrollIntoView(false);   
            }
        }
        xhttp.open("GET", "getchat.php");
        xhttp.send(); 
        setInterval(function(){  
        xhttp.open("GET", "getchat.php");
        xhttp.send(); 
        console.clear();
        }, 100);

        
        document.getElementById("chatfrm").addEventListener("submit", function () {
            document.getElementById("chatfrm").elements["msg"].value = "";
        });   
    </script>

    <?php } else if(isset($_GET['tab']) && $_GET['tab'] == "userlist"){

        $sql = "SELECT * FROM users ORDER BY uid";

        $result = mysqli_query($conn, $sql);

        echo "<table>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['uid']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Joka lauantai yhdistys pitää peli illan kello 21-23 osoitteessa Kaivokatu 1, 00100 Helsinki.</h2>";
    }?>
    </div>

</body>

</html>

<?php 

} else { ?>
    <!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<div class="background-image"></div>
    <div class="topnav">
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    </div>

    <div class="contentloggedout">
    <h1>Sinun täytyy olla kirjautuneena sisään käyttääksesi tätä sivustoa</h1>
    <h2>Voit joko kirjautua sisään tai rekisteröityä yläpalkin painikkeilla</h2>
    </div>

    
<div class="footer">
  <p>Näyttö tehtävä.</p>
</div>

</body>

</html>
<?php
}

 ?>