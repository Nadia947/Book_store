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

<!--cod php de adaugare-->
<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");


 $prenume = $nume = "";



  if (empty($_POST["prenume"])) {
    $nameErr = "Este necesar sa introduceti prenumele.";
    echo $nameErr;
  }
   else if (empty($_POST["nume"])) {
        $nameEr = "Este necesar sa introduceti numele.";
        echo $nameEr;
  } else {
    $prenume = $_POST["prenume"];
    $nume = $_POST["nume"];
 


$sql="INSERT INTO autor (prenume, nume) VALUES ('$prenume','$nume')";
//echo $sql;
 echo "</br>";
$results= mysqli_query($db,$sql);
if (!$results)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "Inregistrarea a fost adaugata.</br>";
  echo "</br>";
 ?> 
<a href="vizualizare3.php" class="button butonok">Vizualizare</a>
<?php
}

}
?>
<!--cod php de adaugare-->



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