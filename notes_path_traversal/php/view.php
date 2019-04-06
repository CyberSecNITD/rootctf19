<?php

    function getContents($authorName,$givenPass,$noteTitle){

         
        $pass_file_name = 'pwd/' . md5($authorName)  ;
        if(file_exists($pass_file_name)){
            $pass = file_get_contents($pass_file_name) ;
            if($pass == md5($givenPass)){

                $file_name = 'notes/' . $noteTitle ;
                $file_name = str_replace('../','',$file_name) ;
                echo $file_name ;
                if(file_exists($file_name)){
                    #str_replace('../','','..././');
                    
                    
                    return file_get_contents($file_name) ;
                }
                else{
                    return 'File_Not_Found';
                }
            }
            else{
    
                return 'Password_Error' ;
            }

        }
        else{

            return 'File_does_not_exist' ;
        }

    }


?><!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Note Application!</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Notes <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view.php">View</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12">


            <form method="get">
               
               <div class="form-group">

                   <label for="authorName">Author Name</label>
                   <input type="text" name="authorName" class="form-control" id="authorName">
               </div>
               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" name="pwd" class="form-control" id="password">
               </div>
               <div class="form-group">

                   <label for="noteTitle">Note's Title</label>
                   <input type="text" name="noteTitle" class="form-control" id="noteTitle">
               </div>

               <div class="form-group">
                   <input type="submit" class="form-control btn btn-primary" id="exampleFormControlInput1"
                       name="submit">
               </div>
           </form>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
 
                if(isset($_GET['authorName']) && isset($_GET['pwd']) && isset($_GET['noteTitle'])){
                   
                    $contents = getContents($_GET['authorName'],$_GET['pwd'],$_GET['noteTitle']) ;

                    if($contents == 'Password_Error'){

                        echo '<div class="alert alert-danger" role="alert">
                        Password Error
                      </div>' ;
                    }
                    else if($contents == 'File_does_not_exist'){

                        echo '<div class="alert alert-danger" role="alert">
                        Password Error
                      </div>' ;

                    }
                    else if($contents == 'File_not_found'){
                        echo '<div class="alert alert-danger" role="alert">
                        File Not Found
                      </div>' ;
                    }
                    else{

                    
                        echo '  <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">'. $_GET['id'] .'</h5>
                                    <p class="card-text">'. $contents .'</p>
                                </div>
                                </div>
                            '; 
                    }
                        
                }?>

              

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