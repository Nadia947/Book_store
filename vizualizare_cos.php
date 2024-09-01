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
include ('myfunctions.php');
//include('securitate.php');
?>

<br>

<?php
$id=$_SESSION['id'];

$sqlv="SELECT id_comanda, imagine, denumire, prenume, nume, pret, cantitate, pret_total FROM comenzi, produse, autor WHERE id_utilizator=$id AND produse.id=comenzi.id_produs AND produse.id_autor=autor.id_autor"; 
$resultv= mysqli_query($db,$sqlv);

if (mysqli_num_rows($resultv) == 0)
 { 
     ?>
    <img src="img/cart.jpg" class="float-center">
    <br>
    <h3 class="text-center" style="color: grey;">Cosul de cumparaturi este gol!</h3>

    <a href="cumpara2.php"><button type="button" class="butonok large button float-center">Cumpara acum</button></a>

    <br>
    <br>
    <br>
    <br> 
    
 <?php }
 else 
 {
    $total=0;
    while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC)){
        $total = $total + $myrow["pret_total"];
?>

<div class="callout large clearfix float-center" style="width: 800px">
 <form method="post" action="">
    <img class="float-left" src="img/<?php echo $myrow["imagine"];?>" width="27%" style="padding-right: 23px" >
    <div class="float-center">
        <h4><?php echo $myrow["denumire"];?></h4>
        <h5><?php echo $myrow["prenume"];?> <?php echo $myrow["nume"];?></h5><br>
        <h5 style="color: lightpink"><?php echo $myrow["pret"];?> lei / bucata</h5>
        <p style="color: grey">Cantitate: </p><h6><?php echo $myrow["cantitate"];?> bucati</h6><br>
        <h6><i class="fa-solid fa-truck"></i> Estimare livrare: </h6>
        <p class="hide"><input type="text" name="id_comanda" value="<?php echo $myrow["id_comanda"];?>"></p>
        <button class="hollow button float-right" type="submit" name="sterge">Elimina</button>
    </div>
  </form>
</div>

<?php
    }

  $procesare=1.99;
  $pret_total=0;
  $pret_total = $total + $procesare;

?>

<div class="callout large clearfix float-center" style="width: 800px">
    <div>
        <h4>Sumar cos</h4>
    </div>    
        <hr>
    <div class="float-left">
        <h5>Cost produse: </h5>
        <h5>Cost livrare: </h5>
        <h5>Cost procesare: </h5>
        <h5>Subtotal: </h5>
    </div>
    <div class="float-right">
        <h5><?php echo $total?> lei</h5>
        <h5>se calculeaza la pasul urmator</h5>
        <h5><?php echo $procesare?> lei</h5>
        <h5><?php echo $pret_total?> lei</h5>
    </div>
    <br>
    <hr>
    <br>
    <div>
        <button class="butonok button" type="submit">Finalizare comanda</button> <br>
        <a href="cumpara2.php" class="hollow button">Continua cumparaturile</a>
    </div>
</div>
  

<br>
<br>
<br>
<?php
 }
?>

<!--cod php pentru stergere-->
<?php

  if (isset($_POST['sterge'])) {

  $db=mysqli_connect("127.0.0.1","root","");
  mysqli_select_db($db,"bookplace");

    $id = "";
    $id = $_POST["id_comanda"];
    

$result= mysqli_query($db,"CALL stergere2('$id')");


if (!$result)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
    redirect("vizualizare_cos.php","Produsul a fost sters");
 }
}

?>
<!--cod php pentru stergere-->

<br>
<br>
<br>
<?php
include('footer.php');
?>