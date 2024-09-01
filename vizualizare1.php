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

<!--cod php de vizualizare-->
<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");


$intrebare= $categorie= $denumire = $imagine = $descriere = $bucati = $pret = $nr_pagini = $limba = $editura = $autor = "";


  
$start=0;
$limit=2;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}



$sqlv="SELECT * FROM produse LIMIT $start, $limit"; 
$resultv= mysqli_query($db,$sqlv);
 

if (!$resultv)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "<table width: 100%>";
  echo "<tr><td><b>Id</b></td><td><b>Categoria</b></td><td><b>Denumire</b></td><td><b>Imagine</b></td><td width:70%><b>Descriere</b></td><td><b>Bucati</b></td><td><b>Pret_bucata</b></td><td><b>Nr_pagini</b></td><td><b>Limba</b></td><td><b>Editura</b></td><td><b>Autor</b></td><td><b>Modifica</b></td></tr>";
     while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC))
     {echo "<tr><td>";
     echo $myrow["id"];
      echo "</td><td>";
      echo $myrow["id_categorie"];
      echo "</td><td>";
      echo $myrow["denumire"];
      echo "</td><td>"; ?>
      <img src="img/<?php echo $myrow["imagine"];?>">
      <?php
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
      echo "</td><td>"; ?>
      <a href="update_produs.php?id=<?php echo $myrow["id"];?>" class="button hollow">Update</a>
<?php echo "</td></tr>"; }
  echo "</table>";
 
 
$rows= mysqli_num_rows(mysqli_query($db,"SELECT * FROM produse "));
$total=ceil($rows/$limit);
if($id>1)
{
echo "<a href='?id=".($id-1)."' class='button butonok'>Inapoi </a>";
}
if($id!=$total)
{
echo "<a href='?id=".($id+1)."' class='button butonok'> Urmator</a>";
}


 }


?>

<br>
<br>
<br>
<ul class="vertical medium-horizontal menu">
 <li><a href="produse.php" class="butonok button">Adauga produs</a></li>
 <li><a href="sterge.php" class="butonok button">Sterge produs</a></li>
 <li><a href="cauta.php" class="butonok button">Cauta produs</a></li>
</ul>
<!--cod php de vizualizare-->


<br>
<br>
<br>
<?php
include('footer.php');
?>