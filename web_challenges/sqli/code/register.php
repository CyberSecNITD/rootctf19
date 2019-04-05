<?php

// Initialize the session
session_start();


// Include config file
require_once '../db.php';


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

      
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Define variables and initialize with empty values
    $email = $password = $user_agent = "";
    $email_err = $password_err = $user_agent_err = "";

    // Validate email
    // Validate email
    $email = trim($_POST['email']) ;
    if(empty($email)){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM Users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo '<script>window.alert("Oops! Something went wrong. Please try again later.")</script>';
            }
            // Close statement
            $stmt->close();
        }

    }


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }


    // Validate User Agent
    if(empty(trim($_SERVER["HTTP_USER_AGENT"]))){
        $user_agent_err = "Try Again , Good Luck !";     
    } else{
        $user_agent = trim($_SERVER["HTTP_USER_AGENT"]) ;
    }




    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($user_agent_err)){
        
       // Prepare an insert statement
       $sql = "INSERT INTO Users (email, password,user_agent) VALUES (?, ?,?)";
        echo 'hi' ;
       if($stmt = $mysqli->prepare($sql)){

           // Bind variables to the prepared statement as parameters
           $stmt->bind_param("sss", $param_email, $param_password,$user_agent);
         
           // Set parameters
           $param_email = $email;
           $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
           
           // Attempt to execute the prepared statement
           if($stmt->execute()){
       
               // Password is correct, so start a new session
               session_start();
                   
               // Store data in session variables
                                  
               
               // Redirect user to welcome page
               header("location: index.php");
           } else{
               echo "<script>window.alert('". "Something went wrong" ."');</script>";
           }
           // Close statement
           $stmt->close();
       } 
    }
}


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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <a class="navbar-brand" href="#">Excess S </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->

            </ul>
            <form class="form-inline my-2 my-lg-0">

                <button class="btn btn-outline-success my-2 mr-2 my-sm-0" type="submit"><a href="login.php">Log
                        In</a></button>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><a
                        href="register.php">Register</a></button>
            </form>
        </div>
    </nav>
    <div class="container my-5">

        <div class="row">
            <div class="col-lg-12">
                <h1 >Sign Up</h1>
                <form method="post">
               
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="form-group" >
                        <button class="btn btn-primary" type="submit">Submit</button>
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