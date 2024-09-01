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

</br>
</br>
</br>

<!--cod php pentru stergere-->
<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");

$denumire = "";


  if (empty($_POST["denumire"])) {
    $nameErr = "Este necesar sa introduceti titlul cartii.";
    echo $nameErr;
  } else {
    $denumire = $_POST["denumire"];
    

$result= mysqli_query($db,"CALL stergere('$denumire')");


if (!$result)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
    echo "Inregistrarea cu titlul ".$denumire." a fost stearsa";
 }
}

?>
<!--cod php pentru stergere-->
<a href="vizualizare1.php" class="button butonok">Vizualizare</a>

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