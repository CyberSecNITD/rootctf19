<?php
    session_start() ;
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

        header('location: login.php') ;
        exit ;

    }
 
    
    require_once '../db.php';
    $id = $_SESSION["id"] ;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Excess S</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <a class="navbar-brand" href="#">Excess S </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Create</a>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container my-5">
  
        <div class="row">
            <div class="col-lg-12">
                <div class="row my-2">
                    <div class="col-lg-12">
                        <h1>My Posts</h1>
                    </div>
                </div>
                <!-- <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> -->
                <?php

                    $sql = "SELECT * FROM BlogPosts WHERE user_id = ? " ;
         

                    if( $stmt = $mysqli->prepare($sql) ){
       
                        $stmt->bind_param("i",$id) ;

                        if($stmt->execute()){

                            $result = $stmt->get_result() ;
                            if($result->num_rows == 0) {
                                echo '<div class="alert alert-info" role="alert">
                                No Posts Yet
                              </div>' ;
                            }
                            else{
                    
                                while($row = $result->fetch_assoc()) {
                                    
                                    $string = '<div class="card">
                                                        <h5 class="card-header">%s</h5>
                                                        <div class="card-body">
                                                            <p class="card-text">%s</p>
                                                        </div>
                                                    </div>' ;

                                    echo sprintf($string,$row['title'],$row['content']) ;

                                }
                            }

                        }


                        $stmt->close() ;
                    }
                 

                ?>

            </div>
        </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>

<?php

$mysqli->close();

?>