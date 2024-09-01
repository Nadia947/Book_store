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
//include('meniu.php');
?>

<?php
$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");
$titlu=$_POST["titlu"];

$sqlv="SELECT produse.id, produse.denumire, produse.imagine, produse.descriere, produse.pret, autor.prenume, autor.nume, editura.denum FROM produse, editura, autor WHERE produse.id_editura=editura.id_editura AND produse.id_autor=autor.id_autor AND produse.denumire='$titlu'"; 
$resultv= mysqli_query($db,$sqlv);

?>

<!--carduri cu produse-->
<section>

  <hr>
  <div class="text-center">
   <h2>Rezultatele cautarii: </h2>
   <p><?php echo $titlu?></p>
  </div>
  <hr>


<div class="grid-container">
<div class="grid-x grid-margin-x small-up-2 medium-up-5">


<?php
 while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC))
 {
?>
 
 
  <div class="cell">
  <form action="pagina_produs.php" method="GET">
    <div class="card" style="width: 200px">
      <div class="card-section">
        <a href="pagina_produs.php?id=<?php echo $myrow["id"];?>&imagine=<?php echo $myrow["imagine"];?>&titlu=<?php echo $myrow["denumire"];?>&prenume=<?php echo $myrow["prenume"];?>&nume=<?php echo $myrow["nume"];?>&editura=<?php echo $myrow["denum"];?>&pret=<?php echo $myrow["pret"];?>&descriere=<?php echo $myrow["descriere"];?>"><img src="img/<?php echo $myrow["imagine"];?>"></a>
      </div>
      <div class="card-section">
        <span><?php echo $myrow["prenume"];?> <?php echo $myrow["nume"];?></span>
        <h5><?php echo $myrow["denumire"];?></h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4><?php echo $myrow["pret"];?></h4>
      </div>
    </div>
 </form>
   </div>


  <?php
  }
  ?>
</div>
</div>
</section>


<hr>
<br>

<br>
<br>
<br>
<?php
include('footer.php');
?>