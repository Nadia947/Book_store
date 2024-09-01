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


<!--cod php de vizualizare-->
<?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");


$nume= $prenume = "";


  
$start=0;
$limit=5;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}



$sqlv="SELECT id_autor, prenume, nume FROM autor LIMIT $start, $limit"; 
$resultv= mysqli_query($db,$sqlv);
 

if (!$resultv)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "<table>";
  echo "<tr><td><b>Id</b></td><td><b>Prenume</b></td><td><b>Nume</b></td></tr>";
     while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC))
     {echo "<tr><td>";
     echo $myrow["id_autor"];
      echo "</td><td>";
      echo $myrow["prenume"];
      echo "</td><td>";
      echo $myrow["nume"];
      echo "</td></tr>";
      }
  echo "</table>";

$rows= mysqli_num_rows(mysqli_query($db,"SELECT * FROM autor "));
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
 <li><a href="adauga_autor.php" class="butonok button">Adauga autor</a></li>
 <li><a href="sterge_autor.php" class="butonok button">Sterge autor</a></li>
 <li><a href="cauta_autor.php" class="butonok button">Cauta autor</a></li>
</ul>
<!--cod php de vizualizare-->

<br>
<br>
<br>
<?php
include('footer.php');
?>