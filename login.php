<script src="js/sweetalert.min.js"></script>
<?php
   // session_destroy();
   // error_reporting(2);
   session_start();
   
   if(isset($_SESSION['email'])){
      if($_SESSION['email'] == $_POST['email']){
         header("location:upload.php");
            }
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      $servername="localhost";
            $username="root";
            $password="";
            $dbname="elibrary";

            //CREATE CONNECTION
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            //CHECK CONNECTION
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }
      $_SESSION['id'] = 1;
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         session_start();  
          $_SESSION['email'] = $myusername;  
          $_SESSION['name'] = $row['name'];
          $_SESSION['id'] = 1;
         
         header("location: upload.php");
      }else {
          $_SESSION['id'] = 0;
        echo '<script type="text/javascript">';
        echo 'alert("Oops!Invalid Login Details")';
        echo '</script>';
      }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
</head>
<body>
    <div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Hello, Admin!</h1>
    <p class="lead">Login to upload E-Books.</p>
    <hr class="my-4">
    <p>Login Now!!!</p>
    <!-- <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p> -->
    </div>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="row">
        <div class="col-sm-3"><br></div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Email: </label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your Email" required>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-3"><br></div>
        <div class="col-sm-6 ">
        <div class="form-group">
            <label for="password">Password: </label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your Password" required>
        </div>
        </div>
        </div>
        <div class="row" >
        <div class="col-sm-12" align="center">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
        </div>
        </form>
    </div>
</body>
</html>