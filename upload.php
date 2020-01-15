<script src="js/sweetalert.min.js"></script>
<?php
session_start();  
if($_SESSION["id"] == 0)  
{  
  header("location:login.php");  
} 

if (@session_status() == PHP_SESSION_NONE) {
  @session_start();
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>E-Library</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
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
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Logout <span class="sr-only"></span></a>
                    </li>
                   </ul>
                </div>
              </nav>
              <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="form-group">
                            <label for="banme">Book Name</label>
                            <input type="text" class="form-control" id="banme" name="bname" placeholder="Book Name.." required>
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="author">Book Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Book Author.." required>
                        </div>
                    </div>
                </div>
                    
                    <!-- <div class="form-group">
                        <label for="author">Book Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Book Author.." required>
                    </div>
                    <div class="form-group">
                            <label for="author">Book Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Book Author.." required>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="domain">Domain</label>
                                    <select multiple class="form-control" id="domain" name="domain" required>
                                            <option value="Science Fiction">Science Fiction</option>
                                            <option value="Satire">Satire</option>
                                            <option value="Drama">Drama</option>
                                            <option value="Action">Action</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Mystery">Mystery</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Self Help">Self Help</option>
                                            <option value="Guide">Guide</option>
                                            <option value="Travel">Travel</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="Law">Law</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Science">Science</option>
                                            <option value="Commerce">Commerce</option>
                                            <option value="Religious">Religious</option>Religious
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="descriptions">Description</label>
                                    <textarea class="form-control" id="descriptions" name="descriptions" rows="3" placeholder="Enter Some Information Related to Book" required></textarea>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="customFile">Upload the Ebook : </label>
                                    <input type="file" name="PDF" id="images" id="customFile">
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <label for="images">Upload the Cover Image: </label>
                                        <input type="file" name="SecondImage" id="images" required>
                            </div>
                        </div>
                    </div>
                        <hr>
                    </div>
                    <div class="form-group" align="center">
                            <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
    </div>

</body>
</html>
<?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
    $uniqueid = uniqid();
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="elibrary";
    $uploadPdfTo = null;
    if(isset($_FILES['PDF'])){
    $pdf_name = $_FILES['PDF']['name'];
    $pdf_size = $_FILES['PDF']['size'];
    $pdf_tmp = $_FILES['PDF']['tmp_name'];
    $uploadPdfTo = uniqid().$pdf_name;
    $movepdf = move_uploaded_file($pdf_tmp,$uploadPdfTo);
    }

    $uploadSecondTo = null;
    if(isset($_FILES['SecondImage'])){
    $second_image_name = $_FILES['SecondImage']['name'];
    $second_image_size = $_FILES['SecondImage']['size'];
    $second_image_tmp = $_FILES['SecondImage']['tmp_name'];
    $uploadSecondTo = uniqid().$second_image_name;
    $moveSecond = move_uploaded_file($second_image_tmp,$uploadSecondTo);
    }

    $conn=mysqli_connect($servername,$username,$password,$dbname);
            //CHECK CONNECTION
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }
       
            $bname=$_POST['bname'];
            $author =$_POST['author'];
            $domain=$_POST['domain'];
            $descriptions=$_POST['descriptions'];
            
            $check=mysqli_query($conn,"SELECT * from books where bname='$bname'"); 
            $checkrows=mysqli_num_rows($check);
            if($checkrows>0)
            {
                echo '<script type="text/javascript">';
                echo 'swal("Book Exists","Adding Failed","error")';
                echo '</script>';
            }
            else
            {
            $sql=" INSERT INTO books (bname,author,domain,descriptions,files,images,uniqueid)
                    VALUES ('$bname','$author','$domain','$descriptions','$uploadPdfTo','$uploadSecondTo','$uniqueid')";
            if (mysqli_query($conn,$sql))
            {
                echo "Book Added Successfully";
                echo '<script type="text/javascript">';
                echo 'swal("Good!","Book Added Successfully","success")';
                echo '</script>';
            }
            else
            {
                echo"Error:" .mysqli_error($conn);
            }
            }
        mysqli_close($conn);
    }





?>