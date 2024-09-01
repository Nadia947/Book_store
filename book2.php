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


<!--imaginea de inceput-->
<section>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
     <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
        <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="img/carti3-1.jpg" alt="Space">
          <figcaption class="orbit-caption text-center">Asa multe carti..</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="img/carti4-1.jpg" alt="Space">
          <figcaption class="orbit-caption text-center">...asa putin timp!</figcaption>
        </figure>
      </li>
    </ul>
  </div>
</div>
</section>
<!--imaginea de inceput-->

<?php
$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");

$start=0;
$limit=10;

$sqlv="SELECT produse.id, produse.denumire, produse.imagine, produse.descriere, produse.pret, autor.prenume, autor.nume, editura.denum FROM produse, editura, autor WHERE produse.id_editura=editura.id_editura AND produse.id_autor=autor.id_autor LIMIT $start, $limit"; 
$resultv= mysqli_query($db,$sqlv);

?>

<!--carduri cu produse-->
<section>

  <hr>
  <div class="text-center">
   <h2>Cele mai vandute</h2>
   <p>In perioada aceasta</p>
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
<!--carduri cu produse-->

<!--banner-->
<br>
<section class="block text-center" style="background: url(img/banner3.jpg);">
  <div class="row">
    <div class="columns">
      <br>
      <h3>Super oferta</h3>
      <h2>Cumperi 2 carti, primesti 1 gratis!</h2>
      <button type="button" class="button hollow large">Descopera</button>
    </div>
  </div>
</section>
<br>
<!--banner-->

<!--carduri cu produse-->
<section>

<div class="grid-container">
<div class="grid-x grid-margin-x small-up-2 medium-up-5">

<?php
$start=10;
$limit=5;

$sql="SELECT produse.id, produse.denumire, produse.imagine, produse.descriere, produse.pret, autor.prenume, autor.nume, editura.denum FROM produse, editura, autor WHERE produse.id_editura=editura.id_editura AND produse.id_autor=autor.id_autor LIMIT $start, $limit"; 
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
<!--carduri cu produse-->


<!--bannere finale-->

<hr>
  <div class="text-center">
   <h2>Recomandate pentru tine</h2>
  </div>
<hr>

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="orbit-slide">
        <div>
         <div class="callout primary large clearfix float-center" style="width: 1000px">
          <img class="float-left" src="img/coperta2.jpg">
          <div class="float-right">
          <h5>Amandoi mor la sfarsit</h5>
          <p class="recomand-font">Adam Silvera ne aduce aminte ca nu exista viata fara moarte si nici dragoste<br>
          fara pierdere, intr-o poveste devastatoare, si totusi optimista, despre doi<br>
          oameni a caror viata se schimba pe parcursul unei zile de neuitat.</p>
          <p class="recomand-font">Pe 5 septembrie, putin dupa miezul noptii, Crainicii Mortii ii suna pe Mateo<br> 
          Torrez si pe Rufus Emeterio sa le dea o veste proasta: vor muri astazi.</p>
          <p class="recomand-font">Mateo si Rufus nu se cunosc, dar, din motive diferite, amandoi cauta un prieten<br> 
          nou in Ziua Sfarsitului. Partea buna e ca exista o aplicatie special pentru asta:Ultimul Prieten. Prin<br> 
          intermediul ei, Rufus si Mateo sunt pe cale sa porneasca intr-o ultima aventura - in cea din urma zi a<br> 
          lor, vor trai cat pentru o viata intreaga.</p>
          <a href="#" class="button butonok">Descopera</a>
          </div>
         </div>
        </div>
      </li>

      <li class="orbit-slide">
        <div>
         <div class="callout warning large clearfix float-center" style="width: 1050px">
          <img class="float-left" src="img/coperta25.jpg">
          <div class="float-right">
          <h5>Crima perfecta. Instructiuni pentru fete cuminti</h5>
          <p class="recomand-font">Toti locuitorii din Little Kilton stiu povestea.</p>
          <p class="recomand-font">Frumoasa si populara printre colegii de liceu, Andie Bell a fost ucisa de iubitul<br> 
          ei, Sal Singh, care, mai apoi, cuprins de remuscari, si-a luat viata. Cinci ani mai tarziu, tragedia inca<br> 
          ii bantuie pe locuitorii linistitului orasel britanic. Prietena din copilarie a presupusului criminal, Pip<br> 
          nu poate scapa de sentimentul obsedant ca lucrurile nu s-au petrecut chiar asa cum vorbeste lumea.</p>
          <p class="recomand-font">Adolescenta se transforma intr-un veritabil detectiv particular si incearca sa<br>
          afle adevarul. Perseverenta si atenta la detalii, Pip ajunge sa descopere o serie de secrete intunecate<br> 
          care demonstreaza fara putinta de tagada ca Sal a fost invinuit pe nedrept. Cineva insa nu e deloc<br> 
          incantat de intorsatura pe care au luat-o lucrurile, iar viata lui Pip este in pericol.</p>
          <a href="#" class="button butonok">Descopera</a>
          </div>
         </div>
        </div>
      </li>

      <li class="orbit-slide">
        <div>
         <div class="callout secondary large clearfix float-center" style="width: 1050px">
          <img class="float-left" src="img/coperta7.jpg">
          <div class="float-right">
          <h5>Curajul de a nu fi pe placul celorlalti</h5>
          <p class="recomand-font">INVATA SA ITI DESCATUSEZI FORTA INTERIOARA PENTRU A DEVENI CEEA CE DORESTI<br> 
          CU ADEVARAT!</p>
          <p class="recomand-font">Pornind de la teoriile lui Alfred Adler, una dintre figurile marcante ale<br>
          psihologiei secolului XX, cartea, construita sub forma dialogului socratic, ne arata ca fiecare<br> 
          dintre noi isi poate controla propria viata, fara a se lasa influentat de traumele trecutului sau<br> 
          de indoielile si asteptarile celor din jur. Acest mod de gandire profund eliberatoare, sustine<br> 
          psihologia adleriana, ne ajuta sa ne dezvoltam curajul de a ne schimba si sa renuntam la limitarile<br> 
          impuse atat de noi insine, cat si de cei din jurul nostru.</p>
          <p class="recomand-font">O carte care ne va schimba viata si ne va ajuta sa ne eliberam mintea de<br> 
          ganduri si atitudini negative, facand in acelasi timp o schimbare durabila, sa atingem fericirea<br> 
          adevarata si sa avem succes in orice domeniu al vietii noastre.</p>
          <a href="#" class="button butonok">Descopera</a>
          </div>
         </div>
        </div>
      </li>  

    </ul>
  </div>
 
</div>
<!--bannere finale-->

<?php
include('footer.php');
?>