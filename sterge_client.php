<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksPlace</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/all.css"> 
  </head>

  <body>

<?php 
require_once("connection.php");
include('navbar.php'); 
include('securitate.php');
?>

<br>
<br>
<br>

<!--cod pentru stergere-->
<div class="card float-center" style="width: 500px; height: 400px;">
  <div class="card-section">
 <h2>Sterge client</h2>

<form method="post" action="sterge_client1.php">  

<div class="row">
    <div class="large-8 medium-8 small-12 columns">  
      Id-ul utilizatorului: <input type="text" name="id" class="cauta">
    </div>

    <div class="large-8 medium-8 small-8 columns">
      <input type="submit" name="submit" class="button butonok" value="OK">  
    </div>
</div>

</form>
</div>
</div>
<!--cod pentru stergere-->

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>

<br>
<br>
<br>
<?php
include('footer.php');
?>