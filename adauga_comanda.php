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

  <body style="background: lightblue;">

  <?php 
require_once("connection.php");
include('navbar.php'); 
//include('securitate.php');
?>

</br>
</br>
</br>

<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");




$id = $id_produs = $cantitate = $pret_total = "";

    $id = $_SESSION["id"];
    $id_produs = $_POST["id_produs"];
    $cantitate =$_POST["bucati"];
    $pret_total=(float)$_POST["pret"] * (float)$cantitate;



    $sql="INSERT INTO comenzi (id_utilizator,id_produs,cantitate,pret_total) VALUES ('$id','$id_produs','$cantitate','$pret_total')";
   // echo $sql;
     echo "</br>";
    $results= mysqli_query($db,$sql);
    if (!$results)
     die('Invalid querry:' .mysqli_error($db));
     else 
     { ?>
    <div class="callout large clearfix float-center" style="width: 400px">
      <h5 class="text-center">Produsul a fost adaugat in cos!</h5>
        <?php echo "</br></br></br>";
        ?> 
        <a href="vizualizare_cos.php" class="button butonok float-center">Vizualizare</a>
    </div>
    <?php
    }
    
    ?>
   
    
    <br>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>