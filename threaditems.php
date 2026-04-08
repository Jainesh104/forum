<!doctype html>
<html lang="en">
<title>Welcome to Thread question</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 450px;
    }
    .comm{
            margin-bottom: 0rem;           
    }
    .descr{
        margin-bottom: 1rem;
    }
    </style>
</head>

<body>
    <?php include 'partials/header.php';?>
    <?php include 'partials/dbconnect.php';?>


    <?php
         $id = $_GET['threadid'];
         $sql= "SELECT * FROM `threads` WHERE t_id=$id";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
                $title = $row['t_title'];
                $desc = $row['t_desc'];
                $username = $row['t_user_id'];

                //posted by name printing
                $sql3 = "SELECT u_email FROM `users` WHERE sno='$username'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $posted_by = $row3['u_email'];
          }
          ?>

          
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <b><u><?php echo $title;?></u></b>  Forum</h1>
            <p class="lead"><?php echo $desc;?></p>
            <p><b>Posted By : </b><em><?php echo $posted_by; ?></em></p>
        </div>
    </div>
<?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'<div class="container">
        <h1>Post a Comment</h1>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
            
            <div class="mb-3">
                <label for="desc" class="form-label">Type a comment</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="commdesc" name="commdesc"
                    row="5" required></textarea> 
                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            </div>
            <button type="submit" class="btn btn-primary">Post a comment</button>
        </form>';}
        else{
            echo '<div class="container"><p class=lead>You are not logged in. Please log in to post a Comment</p> </div>';
        }
?>
  <?php
         $showalert=false;
          $method=$_SERVER['REQUEST_METHOD'];
          if($method== 'POST'){

            $comment = $_POST['commdesc'];
             $comment = str_replace("<", "&lt;", $comment);
              $comment = str_replace(">", "&gt;", $comment);
            $user = $_POST['sno'];
            $sql= "INSERT INTO `comments` (`com_text`, `t_id`, `comm_by`, `com_time`) VALUES ('$comment', '$id', '$user',current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showalert=true;
            if($showalert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }

          }

          ?> 

    <div class="container mb-5" id="ques">
        <h1 class="my-3">Discussions</h1>
 <?php
        $id = $_GET['threadid'];
         $sql= "SELECT * FROM `comments` WHERE t_id=$id";
          $result = mysqli_query($conn, $sql);
          $noresult=true;
          while($row = mysqli_fetch_assoc($result)){
                $noresult=false;
                 $commid = $row['com_id'];
                 $commtext = $row['com_text'];
                $commtime = $row['com_time'];
                $commby = $row['comm_by'];
                $sql3 = "SELECT u_email FROM `users` WHERE sno='$commby'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                            
                 echo '<div class="d-flex mx-5">
                <div class="flex-shrink-0">
                <img src="partials/images/cat-profile.png" height="50px" width="50px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3 "><p class="comm"><b>Comment by: </b>'.$row3['u_email'].'  '.$commtime.' </p><p class="descr">' .$commtext. '</p></div>   </div>';

            } if($noresult){    
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>No Comments!</strong> <p> Be the first person to add a comment.</p>
                    </div>';
            }
                ?>
            
    </div>

    <?php include 'partials/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>
</body>

</html>