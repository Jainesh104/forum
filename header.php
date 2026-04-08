<?php
   session_start();
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact US</a>
        </li>
      </ul>
       <div>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="d-flex" role="search"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success mx-2" type="submit">Search</button>
                     <p class="text-light my-0 mx-2"> Welcome '.$_SESSION['useremail'].'</p>
                      <a class="btn btn-success mx-2 my-2" href="partials/logout.php">Logout</a></form>';
      
      }else{
                    echo '<button class="btn btn-success ml-2 my-2" type="button" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
                            <button class="btn btn-success mx-2" type="button" data-bs-toggle="modal" data-bs-target="#signupmodal">SignUp</button>
                           <form class="d-flex" role="search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn btn-outline-success mx-2" type="submit">Search</button></form>';}

          echo  '</div>
          </div>
        </div>
      </nav>';


include 'partials/loginmodal.php';
include 'partials/signupmodal.php';
  if (isset($_GET['signupsuccess'])&& $_GET['signupsuccess']==true){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You can log into your account.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
              }
   
?>