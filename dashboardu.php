
<?php

require_once("connection.php");
include 'header.php';
include 'navbar.php';
//include('meniu.php');

include('securitateu.php');

if(count($_POST)>0) {
  mysqli_query($con,"UPDATE utilizatori set telefon='" . $_POST['telefon'] . "' WHERE id='" . $_SESSION['id'] . "'");
  }
$result = mysqli_query($con,"SELECT telefon FROM utilizatori WHERE id='" . $_SESSION['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<br>


<div class="callout large clearfix float-center" style="width: 700px">
    <div class="row">

    <h3>Bine ai venit, <?php echo$_SESSION["prenume"] ?>!</h3>

        <br>
        <br>
        <br>
        <br>
       
      <h5>Detalii cont:</h5>
      <br>
      
      <p><b style="color: lightgrey">Nume:</b> <?php echo $_SESSION["nume"] ?></p>
      <p><b style="color: lightgrey">Prenume:</b> <?php echo $_SESSION["prenume"] ?></p>
      <p><b style="color: lightgrey">Email:</b> <?php echo $_SESSION["email"] ?></p>
      <p><b style="color: lightgrey">Telefon: </b> <?php echo $row["telefon"] ?> <button type="button" class="button hollow small" data-open="telefonModal"><i class="fa-solid fa-pen"></i></button></p>
      <p><b style="color: lightgrey">Adresa:</b> <?php echo $_SESSION["strada"] ?>, nr. <?php echo$_SESSION["numarul"] ?></p>
      <p><b style="color: lightgrey">Localitatea:</b> <?php echo $_SESSION["localitate"] ?></p>
      <p><b style="color: lightgrey">Judetul: </b> <?php echo $_SESSION["judet"] ?></p>
      
        <br>
        <br>
        <br>

    <a href="logout.php" class="butonok button">Logout</a>
    <button type="button" class="button hollow float-right" data-open="stergeModal">Sterge cont</button><br>
    <a href="update_parola.php">Schimba parola</a>
    </div>
</div>


<!--modal pentru stergere cont-->
<div class="reveal" id="stergeModal" data-reveal>
<h2>Sterge cont</h2>

<form method="post" action="sterge_cont.php">  

  <div class="row">
      <div class="large-8 medium-8 small-12 columns">  
        Esti sigur ca doresti sa stergi contul?
      </div>
      <br>
      <br>
      <div class="large-8 medium-8 small-8 columns">
      <input type="submit" name="submit" class="button butonok" value="Continua"> 
      </div>

      <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
      
  </div>

</form>
</div>
<!--modal pentru stergere cont-->


<!--modal pentru update telefon-->
<div class="reveal" id="telefonModal" data-reveal>
<h2>Modifica telefon</h2>

<form method="post" action="">  

  <div class="row">
      <div class="large-8 medium-8 small-12 columns">  
        Introdu noul numar de telefon
      </div>
      <br>
      <input type="text" name="telefon" class="cauta">
      <br>
      <div class="large-8 medium-8 small-8 columns">
      <input type="submit" name="submit" class="button butonok" value="OK"> 
      </div>

      <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
      
  </div>

</form>
</div>
<!--modal pentru update telefon-->

<?php include 'footer.php'; ?>

