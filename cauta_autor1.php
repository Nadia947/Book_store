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

$nume = $prenume = "";


  if (empty($_POST["prenume"])) {
    $nameErr = "Este necesar sa introduceti prenumele.";
    echo $nameErr;
  }
  else if (empty($_POST["nume"])) {
    $nameEr = "Este necesar sa introduceti numele.";
    echo $nameEr;
  }
  else {
    $prenume = $_POST["prenume"];
    $nume = $_POST["nume"];
    $sql="SELECT * FROM autor where prenume='$prenume' and nume='$nume' ";

$result= mysqli_query($db,$sql);

if (!$result)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
    echo "<table border=1 cellpadding=2>";
    echo "<tr><td><b>Id</b></td><td><b>Prenume</b></td><td><b>Nume</b></td></tr>";
       while ($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC))
       {echo "<tr><td>";
       echo $myrow["id_autor"];
        echo "</td><td>";
        echo $myrow["prenume"];
        echo "</td><td>";
        echo $myrow["nume"];
        //echo "</td><td>";
        }
    echo "</table>";
 }
}

?>
<a href="vizualizare3.php" class="button butonok">Vizualizare</a>
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
