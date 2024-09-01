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


$intrebare= $categorie= $denumire = $imagine = $descriere = $bucati = $pret = $nr_pagini = $limba = $editura = $autor = "";



  if (empty($_POST["denumire"])) {
    $nameErr = "Este necesar sa introduceti denumirea cartii.";
    echo $nameErr;
  } else {
    $denumire = $_POST["denumire"];
    $categoria = $_POST["categoria"];
    $imagine =$_POST["imagine"];
    $descriere = $_POST["descriere"];
    $bucati = $_POST["bucati"];
    $pret = $_POST["pret"];
    $nr_pagini= $_POST["nr_pagini"];
    $limba=$_POST["limba"];
    $editura=$_POST["editura"];
    $autor=$_POST["autor"];


$sql="INSERT INTO produse (id_categorie,denumire,imagine,descriere,bucati,pret,nr_pagini,limba,id_editura,id_autor) VALUES ('$categoria','$denumire','$imagine','$descriere','$bucati','$pret','$nr_pagini','$limba','$editura','$autor')";
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
<a href="vizualizare1.php" class="button butonok">Vizualizare</a>
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