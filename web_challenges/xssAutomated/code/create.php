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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->


            </ul>

        </div>
    </nav>
    <div class="container my-5">

        <div class="row">
            <div class="col-lg-12">
                <form method="post">

                    <div class="form-group">

                        <label for="blogTitle">Title</label>
                        <input type="text" name="blog_title" class="form-control" id="blogTitle">
                    </div>

                    <div class="form-group">
                        <label for="blog_content">Content</label>
                        <textarea class="form-control" name="blog_content" id="blog_content" rows="3"
                            placeholder="Please write your content here"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" id="submit-btn"
                            name="submit">
                    </div>
                </form>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){

                        if(isset($_POST['blog_content'],$_POST['blog_title'])){
                
                            $title = $_POST['blog_content'] ;
                            $content = $_POST['blog_title'] ;
                          
                            $sql = "INSERT INTO BlogPosts(user_id,title,content) VALUES(?,?,?) " ;
                
                            if($stmt = $mysqli->prepare($sql)){
                                $stmt->bind_param("iss",$id,$title,$content);
                                  
                    
                                if($stmt->execute()){
                
                                    echo '<div class="alert alert-info" role="alert">
                                                Inserted Successfully
                                              </div>' ;
                              
                                }
                                else{
                                    echo "<script> window.alert('Error Encountered') </script>" ;
                                }
                
                            }
                
                        }
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