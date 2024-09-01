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


$nume= $prenume = $email = $strada = $numarul = $localitate = $judet = $telefon = $parola = "";


  
$start=0;
$limit=5;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}



$sqlv="SELECT id, nume, prenume, email, strada, numarul, localitate, judet, telefon, parola FROM utilizatori WHERE tip_utilizator='0' LIMIT $start, $limit"; 
$resultv= mysqli_query($db,$sqlv);
 

if (!$resultv)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "<table>";
  echo "<tr><td><b>Id</b></td><td><b>Nume</b></td><td><b>Prenume</b></td><td><b>Email</b></td><td><b>Strada</b></td><td><b>Numar</b></td><td><b>Localitate</b></td><td><b>Judet</b></td><td><b>Telefon</b></td><td><b>Parola</b></td>";
     while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC))
     {echo "<tr><td>";
     echo $myrow["id"];
      echo "</td><td>";
      echo $myrow["nume"];
      echo "</td><td>";
      echo $myrow["prenume"];
      echo "</td><td>";
      echo $myrow["email"];
      echo "</td><td>";
      echo $myrow["strada"];
      echo "</td><td>";
      echo $myrow["numarul"];
      echo "</td><td>";
      echo $myrow["localitate"];
      echo "</td><td>";
      echo $myrow["judet"];
      echo "</td><td>";
      echo $myrow["telefon"];
      echo "</td><td>";
      echo $myrow["parola"];
      echo "</td></tr>";
      }
  echo "</table>";

$rows= mysqli_num_rows(mysqli_query($db,"SELECT * FROM utilizatori "));
$total=ceil($rows/$limit);
if($id>1)
{
echo "<a href='?id=".($id-1)."' class='button butonok'>Inapoi </a>";
}
if($id!=$total)
{
echo "<a href='?id=".($id+1)."' class='button butonok'> Urmator</a>";
}

/*
echo "<ul class='page'>";
for($i=1;$i<=$total;$i++)
{
if($i==$id) { echo "<li class='current'>".$i."</li>"; }

else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
}
echo "</ul>";
*/

 }


?>

<br>
<br>
<br>
<ul class="vertical medium-horizontal menu">
 <li><a href="sterge_client.php" class="butonok button">Sterge client</a></li>
 <li><a href="cauta_client.php" class="butonok button">Cauta client</a></li>
</ul>
<!--cod php de vizualizare-->

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