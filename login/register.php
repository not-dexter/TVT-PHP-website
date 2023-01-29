<!DOCTYPE html>

<html>

<head>

    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="background-image"></div>
        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

     <form class="loginform" style="height: 480px;"action="register_auth.php" id="register" method="post">

        <h2 style="text-align: center;">Register</h2>
        


        <input type="text" name="email" placeholder="Email"><br>
        <br>
        <br>
        <input type="text" name="uname" placeholder="Username"><br>
        <br>
        <br>
        <input type="text" name="address" placeholder="address"><br> 
        <br>
        <br>
        <input type="text" name="pnumber" placeholder="Phone number"><br> 
        <br>
        <br>
        <input type="password" name="password" placeholder="Password"><br> 
        <br>
        <br>
        <input type="password" name="cpassword" placeholder="Confirm password"><br> 
        <br>
        <br>
        <br>
        <button type="submit" name="submitbutton">SIGN UP</button>

     </form>
    <p></p>
</body>

</html>