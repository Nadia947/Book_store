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

<!--banner-->
<section class="block text-center" style="background: url(img/banner.jpg);">
  <div class="row">
    <div class="columns">
      <br>
      <br>
        <h3 style="color: white;">"O camera fara carti este ca  un corp fara suflet"</h3>
        <p style="color:white;">G. K. CHESTERTON</p>
      <br>
    </div>
  </div>
</section>
<br>
<!--banner-->

<!--carduri cu produse-->
<section>

  <hr>
  <div class="text-center">
   <h2>Descopera cele mai vandute produse</h2>
   <p>Profita de reduceri de pana la 50%</p>
  </div>
  <hr>


<div class="grid-container">
<div class="grid-x grid-margin-x small-up-2 medium-up-5">

<?php
$start=0;
$limit=10;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

$sql="SELECT produse.id, produse.denumire, produse.imagine, produse.descriere, produse.pret, produse.bucati, autor.prenume, autor.nume, editura.denum FROM produse, editura, autor WHERE produse.id_editura=editura.id_editura AND produse.id_autor=autor.id_autor LIMIT $start, $limit"; 
$result= mysqli_query($db,$sql);

 while ($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC))
 {
?>
 
 
  <div class="cell">
  <form action="pagina_produs.php" method="GET">
    <div class="card" style="width: 200px">
      <div class="card-section">
        <a href="pagina_produs.php?id=<?php echo $myrow["id"];?>"><img src="img/<?php echo $myrow["imagine"];?>"></a>
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
        <h6>Bucati: <?php echo $myrow["bucati"];?></h6>
      </div>
    </div>
 </form>
   </div>


  <?php
  }

$rows= mysqli_num_rows(mysqli_query($db,"SELECT * FROM produse "));
$total=ceil($rows/$limit);

  ?>

</div>
</div>

</section>
<!--carduri cu produse-->

<!--navigare pagini-->
<br>
<nav aria-label="Pagination">
  <ul class="pagination text-center">
      <?php
      if($id>1)
      {
      echo "<li><a href='?id=".($id-1)."' class='button butonok'>Inapoi</a></li>";
      }
      for($i=1;$i<=$total;$i++)
      {
      if($i==$id) { echo "<li class='current'>".$i."</li>"; }

      else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
      }
      if($id!=$total)
      {
      echo "<li><a href='?id=".($id+1)."' class='button butonok'> Urmator</a></li>";
      }
      ?>
  </ul>
</nav>
<br>
<!--navigare pagini-->

<?php
include('footer.php');
?>

