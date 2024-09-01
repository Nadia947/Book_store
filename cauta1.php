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

<!--cod php pentru cauta-->
<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");

$denumire = "";


  if (empty($_POST["denumire"])) {
    $nameErr = "Este necesar sa introduceti titlul cartii.";
    echo $nameErr;
  } else {
    $denumire = $_POST["denumire"];
    $sql="SELECT * FROM produse where denumire='$denumire' ";

$result= mysqli_query($db,$sql);

if (!$result)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "<table border=1 cellpadding=2>";
  echo "<tr><td><b>Id</b></td><td><b>Categoria</b></td><td><b>Denumire</b></td><td><b>Imagine</b></td><td><b>Descriere</b></td><td><b>Bucati</b></td><td><b>Pret_bucata</b></td><td><b>Nr_pagini</b></td><td><b>Limba</b></td><td><b>Editura</b></td><td><b>Autor</b></td></tr>";
     while ($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC))
     {echo "<tr><td>";
     echo $myrow["id"];
      echo "</td><td>";
      echo $myrow["id_categorie"];
      echo "</td><td>";
      echo $myrow["denumire"];
      echo "</td><td>";
      echo $myrow["imagine"];
      echo "</td><td>";
      echo $myrow["descriere"];
      echo "</td><td>";
      echo $myrow["bucati"];
      echo "</td><td>";
      echo $myrow["pret"];
      echo "</td><td>";
      echo $myrow["nr_pagini"];
      echo "</td><td>";
      echo $myrow["limba"];
      echo "</td><td>";
      echo $myrow["id_editura"];
      echo "</td><td>";
      echo $myrow["id_autor"];
      echo "</td><td>"; }
  echo "</table>";
     }
    }

?>
<a href="vizualizare1.php" class="button butonok">Vizualizare</a>
<!--cod php pentru cauta-->



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