
<?php session_start(); ?>
<!DOCTYPE html>
<?php 
file_get_contents("https://newsapi.org/v2/everything?q=bitcoin&from=2019-06-23&sortBy=publishedAt&apiKey=e19db81d75954be5ada6ddd72cf745ce");
include("config.php");

if($_SESSION['semail']=="") {
  header("location:login.php");
} else {
  $name = $_SESSION['semail'];
  $q = "SELECT * FROM `user` WHERE email ='$name';";
  $query = mysqli_query($conn, $q);
  $row = mysqli_fetch_array($query);
}
?>

<html lang="en">
<!-- header start -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> NEWS PAPER</title>
  </head>
 <!--  header close  -->
 <!-- body start -->
  <body>
<?php
  $search = 'google';
  if (isset($_GET['search'])) {
  $search = $_GET['search'];
  }
?>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <div class="container pt-5">

    <h2> Hello <?php echo $row['fname'];?> <?php echo $row['lname'];?> </h2><br>
    <h2> Welcome to our website</h2>

  </div>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>

</nav>
    <div class="container pt-5" >
      <form method="GET">
        <div class="input-group mb-3">
           <input type="text" class="form-control" id="search" name="search" placeholder="Search" aria-label="Recipient's username" value="<?php echo @$_GET['search'];?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" name="searchbtn">Search</button>
            </div>
        </div>
      </form>
  <?php
      $response = file_get_contents("https://newsapi.org/v2/everything?q=$search&from=2019-06-23&sortBy=publishedAt&language=en&apiKey=e19db81d75954be5ada6ddd72cf745ce");
      $response = json_decode($response);
       foreach ($response->articles as $article) { 
  ?>
     
      <div class="border p-2 mb-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?php echo $article->urlToImage ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-8">
            <div class="content">
              <h1 class="title"><?php echo $article->title ?></h1>
              <p class="author"><?php echo $article->author ?></p>
              <p class="description"><?php echo $article->description ?></p>
              <input type="button" name="readmore" class="btn btn-link" value="Read More" onclick=" window.open('<?php echo $article->url ?>','_blank')">
            </div>
          </div>
        </div>
      </div>
<?php } ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      $(function() {
        alert();
      });
    </script>
  </body>
</html>