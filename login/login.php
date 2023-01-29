<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript">
        localStorage.clear();
    </script>
</head>

<body style="background-color: #111">
<div class="background-image"></div>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>   
    <?php }
    if (isset($_GET['alert'])) { ?>
        <p class="alert"><?php echo $_GET['alert']; ?></p>
    <?php } ?>

     <form class="loginform" action="auth.php" method="post">

        <h2 style="text-align: center;">LOGIN</h2>

        <input type="text" name="uname" placeholder="Username"><br>
        <br>
        <br>
        <input type="password" name="password" placeholder="Password"><br> 
        <br>
        <br>
        <br>
        <button type="submit">SIGN IN</button>
     </form>
     <p></p>

</body>

</html>