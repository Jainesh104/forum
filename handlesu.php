<?php
$showerror = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $uemail = $_POST['signupemail'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $existsql = "SELECT * FROM `users` WHERE u_email = '$uemail'";
    $result = mysqli_query($conn, $existsql);
    $numrows = mysqli_num_rows($result);
    if($numrows>0){
      $showerror = "Email already exist";
    }else{
        if($pass==$cpass){
            $hash= password_hash($pass, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`u_email`, `u_password`, `time`) VALUES ('$uemail', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                $showalert = true;
                header("Location:/forum/index.php?signupsuccess=true");
                exit();
            }
        }else{
            $showerror = "Passwords are not matching.";
        }
    }
    header("Location:/forum/index.php?signupsuccess=false&error=$showerror");
    }

?>
