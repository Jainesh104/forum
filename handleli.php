<?php
$login = false;
$showerror = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $liemail = $_POST['loginemail'];
    $lipass = $_POST['lgpassword'];
    $sql = "SELECT * FROM `users` WHERE u_email = '$liemail'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    if($numrows==1){
        $row = mysqli_fetch_assoc($result);
            if(password_verify($lipass, $row['u_password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['useremail'] = $liemail;
                echo "Logged in: $liemail";
                }
                    header("Location:/forum/index.php?successlogin");
                       }

    }


?>
