<?php 

include "db_connect.php";
 $conn->autocommit(FALSE);

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $cpass = validate($_POST['cpassword']);
    $email = validate($_POST['email']);
    $pnum = validate($_POST['pnumber']);
    $address = validate($_POST['address']);

    if (empty($uname)) {

        header("Location: register.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: register.php?error=Password is required");

        exit();

    }else if(empty($cpass)){

        header("Location: register.php?error=Password confirmation is required");

        exit();

    }else if(empty($email)){

        header("Location: register.php?error=Email is required");

        exit();

    }else if(empty($pnum)){

        header("Location: register.php?error=Phone number is required");

        exit();

    }else if(empty($address)){

        header("Location: register.php?error=Address is required");

        exit();

    }else if($pass != $cpass){

        header("Location: register.php?error=Passwords don't match");

        exit();

    }else{
        $sql_u = "SELECT * FROM users WHERE username='$uname'";
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($conn, $sql_u);
        $res_e = mysqli_query($conn, $sql_e);
  
        if (mysqli_num_rows($res_u) > 0) {
            header("Location: register.php?error=Username already in use");
        }else if(mysqli_num_rows($res_e) > 0){         
            header("Location: register.php?error=Email already in use");
        }
        else {
            $query = "INSERT INTO users (uid,username,email,password,phone,address,admin) VALUES ('0','$uname','$email','$pass','$pnum','$address', '0')";
            $conn->query($query);
            if (!$conn -> commit()) {
                header("Location: login.php?alert=commit didnt work Sadge");
                exit();
              }
            header("Location: login.php?alert=account successfully created");
            exit();
        }
    }

}else{

    header("Location: index.php");

    exit();

}
?>