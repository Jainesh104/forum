<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
         $exist=false;
        $existSql= "SELECT *FROM `users`  WHERE username = '$username'";
           $result = mysqli_query($conn, $existSql);
           $numExistRows =  mysqli_num_rows($result);
           if($numExistRows > 0){
            $showerror = "Username already exist.";
           }else{
            // $exist = false;
           
        if($password == $cpassword) 
          {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql= "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showalert = true;
            }
        }
        else{
            $showerror = "Passwords are not matchnig.";
        }
    } 
    }
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'partials/_nav.php'
    ?>
    <?php
    if($showalert){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created. You can Login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if($showerror){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oops!</strong> ' . $showerror.' 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
?>
    <div class="container my-4" >
        <h1 class="text-center">Sign to our website</h1>
<form action="/loginsys/signup.php" method="POST">
  <div class="col-md-6">
    <label for="username"  class="form-label">Username</label>
    <input type="text" maxlength="15" class="form-control" id="username" name="username" id="username"aria-describedby="emailHelp">
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
   <div class="col-md-6">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="cpassword" class="form-text">Make sure confirm password is same as your password.</div>
  </div>

  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>