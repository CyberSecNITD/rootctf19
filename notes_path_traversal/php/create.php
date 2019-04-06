<!doctype html>
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
                
                <?php
 
                #if(isset($_POST['submit'])  && !empty($_POST['authorName']) && !empty($_GET['noteTitle']) ){
                if(isset($_POST['submit'])   ){    
                   

                    #Save the password to a file
                    $pass_file_name = "pwd/" . md5($_POST['authorName']) ;
                    $passFile = fopen($pass_file_name,"w"); 
                    fwrite($passFile,md5($_POST['pwd'])) ;
                    fclose($passFile) ;
            
                    #Save the file contents to a file
                    $note_file_name = "notes/" . $_POST['noteTitle'] ;
                    $noteFile = fopen($note_file_name,"w") ;
                    fwrite($noteFile,$_POST['text']) ;
                    fclose($noteFile) ;
            
            
                    echo '<div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                          </div>' ;
                }
                ?>
                <form method="post">
               
                    <div class="form-group">

                        <label for="lauthorName">Author Name</label>
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
                        <label for="notes_text">Notes Text</label>
                        <textarea class="form-control" name="text" id="notes_text" rows="3"
                            placeholder="Notes Text"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" id="exampleFormControlInput1"
                            name="submit">
                    </div>
                </form>

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