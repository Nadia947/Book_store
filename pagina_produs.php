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
/*include('meniu.php'); <?php echo$_POST["denumire"]; ?> */


$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");

$id = $_GET["id"];
$sql="SELECT * FROM produse, autor, editura WHERE produse.id=$id AND produse.id_autor=autor.id_autor AND produse.id_editura=editura.id_editura";
$result= mysqli_query($db,$sql);

if ($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$titlu = $myrow["denumire"];
$imagine = $myrow["imagine"];
$prenume = $myrow["prenume"];
$nume = $myrow["nume"];
$editura = $myrow["denum"];
$pret = $myrow["pret"];
$descriere = $myrow["descriere"];
}

?>

<br>

<form method="post" action="adauga_comanda.php">
<div class="callout large clearfix float-center" style="width: 1050px">

          <img class="float-left" src="img/<?php echo $imagine;?>" width="32%" style="padding-right: 50px" >

          <div class="float-center">
          <h3><?php echo $titlu; ?></h3>
            <br>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <br>
        <label>
          Pret: <h5><?php echo $pret; ?></h5>
          </label>
          <label>
           Autor: <h5><?php echo $prenume;?> <?php echo $nume;?></h5>
          </label>
          <label>
           Editura: <h5><?php echo $editura; ?></h5>
          </label>
          <label>Numar de bucati:
              <select class="cauta" style="width: 100px" name="bucati">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </label>

<p class="hide"><input type="text" name="id_produs" value="<?php echo $id; ?>"></p>
<p class="hide"><input type="text" name="pret" value="<?php echo $pret; ?>"></p>        
<button class="hollow button"><i class="fa-solid fa-heart"></i></button>
<button class="butonok button" type="submit" name="submit">Adaugă în coș</button>

 </div>
</div>
</form>

<div class="callout large clearfix float-center" style="width: 1050px">
<h3>Descriere</h3>
<br>
<p><?php echo $descriere; ?></p>
</div>


<?php
include('footer.php');
?>


