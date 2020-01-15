<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
</head>
<body>
    

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                   </ul>
                </div>
              </nav>
              <div class="jumbotron">
                <h1 class="display-4">Hello, Users!</h1>
                <p class="lead">Here are the List of Ebooks.</p>
                <hr class="my-4">
                <p>Get your ebook now!!</p>
                <!-- <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p> -->
                </div>
              <br>
        <div class="row">
        <?php                     
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="elibrary";

                    $conn=mysqli_connect($servername,$username,$password,$dbname);

                    if(!$conn){
                        die("connection failed:" . mysqli_connect_error());
                    }

                    $sql = "SELECT * from books ORDER BY id DESC";

                    $result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
                    while($resultArray = mysqli_fetch_array($result))
                    {
                    echo '<div class="col-sm-4">';
                    echo '<div class="card">';
                    echo '<img src="'.$resultArray['images'].'" class="card-img-top" alt="..." width=400px height=200px>';
                    echo '<div class="card-body">';
                    echo  '<h5 class="card-title">Book Name:-'.$resultArray['bname'].'</h5>';
                    echo '<p>Author:-'.$resultArray['author'].'</p>';
                    echo '<p>Domain:-'.$resultArray['domain'].'</p>';
                    echo '<p>Description:-'.$resultArray['descriptions'].'</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<a href="'.$resultArray['files'].'" class="btn btn-danger d-flex justify-content-center">Download</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<br>';
                    echo '<br>';
                    echo '</div>';
                    }
        ?>
        </body>
</html>