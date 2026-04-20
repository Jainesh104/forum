<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <style>
          #ques{
            min-height: 450px;
          }
        </style>
</head>

<body>
    <?php include 'partials/header.php';?>
    <?php include 'partials/dbconnect.php';?>


    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="partials/images/home1.jpg" height="500px" class="d-block w-100" alt="...">
                </div>
            <div class="carousel-item">
                <img src="partials/images/home2.jpg" height="500px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="partials/images/home3.jpg" height="500px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container" id="">
        <h2 class="text-center">Welcome to categories</h2>
        <div class="row">

            <?php   
          $sql= "SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['c_id'];
            $cat = $row['c_name'];
            $desc = $row['c_description'];
                    echo  '<div class="col-md-4 my-2">
                            <div class="card" style="width: 18rem;">
                             <a href="threads.php?catid=' .$id. '"> <img src="partials/images/card1.jpg" class="card-img-top" height="220px" width="280px" alt="img1"></a>

                              <div class="card-body">
                                <h5 class="card-title "> '.$cat. '</a> </h5>
                                <p class="card-text">' .substr($desc, 0, 100). '...</p>
                                <a href="threads.php?catid=' .$id. '" class="btn btn-primary">View Threads</a>
                              </div>
                            </div>
                          </div>';            
                        }
?>
        </div>
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