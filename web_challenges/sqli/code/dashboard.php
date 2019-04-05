<?php
    session_start() ;
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

        header('location: index.php') ;
        exit ;

    }
    
    require_once '../db.php';
    
      // Validate User Agent
    if(empty(trim($_SERVER["HTTP_USER_AGENT"]))){
        $_err = "Try Again , Good Luck !";     
    } else{
        $user_agent = trim($_SERVER["HTTP_USER_AGENT"]) ;
    }

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
            <a class="navbar-brand" href="#">SQL Injection </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->

            </ul>

        </div>
    </nav>
    <div class="container my-5">
        
          
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">E Mail</th>
                    <th scope="col">User-Agent</th>
                </tr>
            </thead>
            <tbody>


                <?php

                    
                    $table_row = '<tr>
                                        <th scope="row">%s</th>
                                        <td>%s</td>
                                        <td>%s</td>
                                </tr>' ;
                    

                    $sql = "SELECT email,user_agent FROM Users WHERE user_agent = '%s' " ; 
                    $sql = sprintf($sql,$user_agent);
                    $result = $mysqli->query($sql) ;

                    if($result->num_rows > 0){

                        $i = 0 ;
                        while($row = $result->fetch_assoc()){

                            $i = i+1 ;
                            echo sprintf($table_row,$i,$row['email'],$row['user_agent']) ;

                        }


                    }
                ?>
            </tbody>
        </table>

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