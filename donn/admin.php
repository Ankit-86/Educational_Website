<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // include 'partials/_dbconnect.php';
    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from `admin` where `username`='$username'AND password='$password'";
    $res = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($res);
    if ($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: bb.php");
        }   
    else{
        $showError = "Invalid Credentials";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    <title>Admin</title>
  </head>
  <body style="background-color: aqua;">
  <nav style="background-color:black;">
            <div class="logo"><h1 class="animate__animated animate__heartBeat animate__infinite infinite " style="font-size: 30px;">Brain Mentors</h1></div>
            <div class="menu" style="" >
                <a href="index.php" class="buttonc"  >Home</a>
                <a href="books.php" class="buttonc" >Books</a>
                <a href="video.html"  class="buttonc" >Lectures</a>
                <a href="signup.php" class="buttonc" >SignUp</a>
              
            </div>
        </nav>

  <?php
  if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <br>
    <br>
    <br>
  <div class="container my-4 text-white p-4 col-md-6"  style="background-color: black;">
     <h1 class="text-center">Admin Login</h1>
     <form action="admin.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
       
         <p> Not admin?<a style="color:blue" href="login.php">Login as user</a> here</p>
         <p> <a style="color:blue" href="signup.php">Sign up</a> as user here</p>
        <button type="submit" class="btnc">Login</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>