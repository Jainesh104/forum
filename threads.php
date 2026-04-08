<!doctype html>
<html lang="en">

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
    </style>
</head>

<body>
    <?php include 'partials/header.php';?>
    <?php include 'partials/dbconnect.php';?>


    <?php
         $id = $_GET['catid'];
         $sql= "SELECT * FROM `categories` WHERE c_id=$id";
          $result = mysqli_query($conn, $sql);
          
          while($row = mysqli_fetch_assoc($result)){
                $catname = $row['c_name'];
                $catdesc = $row['c_description'];
          }
          ?>

    <?php
         $showalert=false;
          $method=$_SERVER['REQUEST_METHOD'];
          if($method== 'POST'){
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];
            $sno=$_POST['sno'];
            $sql= "INSERT INTO  `threads` ( `t_title`, `t_desc`, `t_c_id`, `t_user_id`, `timestamp`) VALUES ('$th_title','$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showalert=true;
            if($showalert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your Question has been posted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }

          }

          ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;?> Forum</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is a peer forum for sharing knowledge with each others. No talks out of the topics. no spamming.</p>
            <a href="index.php" class="btn btn-success btn-lg" role="button">Browse topics</a>
        </div>
    </div>

<?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
   echo '<div class="container">
        <h1>Start a discussion</h1>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Question title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                <div id="emailHelp" class="form-text">write a short question here.</div>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            <div class="mb-3">
                <label for="desc" class="form-label">Explain your question</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc"
                    row="3"></textarea>
                <!-- <label for="floatingTextarea2">Comments</label> -->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>';}
    else{
        echo '<div class="container"><p class=lead>You are not logged in. Please log in to start a discussion</p> </div>';
    }
?>
    <div class="container" id="ques">
        <h1 class="my-5">Browse Questions :</h1>

        <?php
        $id = $_GET['catid'];
         $sql= "SELECT * FROM `threads` WHERE t_c_id=$id";
          $result = mysqli_query($conn, $sql);
          $noresult =true;
          while($row = mysqli_fetch_assoc($result)){
                $noresult =false;
                $id = $row['t_id'];
                $title = $row['t_title'];
                $desc = $row['t_desc'];
                $time = $row['timestamp']; 
                $t_user_id = $row['t_user_id'];
                $sql2 = "SELECT u_email FROM `users` WHERE sno='$t_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
      
                echo '<div class="d-flex my-5">
                            <div class="flex-shrink-0 ">
                                 <img src="partials/images/cat-profile.png" height="50px" width="50px" alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                 <h5 class="mt-0"><a class="text-dark" href="threaditems.php?threadid='.$id.'">'.$title.'</a></h5> '.$desc.'</div><p><b>Asked by:  </b> ' .$row2['u_email'].' at '.$time.'</p>
                            
                            </div>';
                            if(!$result2){
                                echo '<p><b>Asked by: </b>No user found</p>';
                            }
            }
            if($noresult){
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>No Questions!</strong> <p> Be the first person to Ask question.</p>
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