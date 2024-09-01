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
include_once 'dbcon.php';
include 'navbar.php';
include 'myfunctions.php';


if(count($_POST)>0) {
mysqli_query($con,"UPDATE produse set denumire='" . $_POST['denumire'] . "', descriere='" . $_POST['descriere'] . "' ,bucati='" . $_POST['bucati'] . "' ,pret='" . $_POST['pret'] . "' WHERE id='" . $_GET['id'] . "'");
redirect("vizualizare1.php","Produsul a fost modificat");
}
$result = mysqli_query($con,"SELECT * FROM produse WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="card float-center" style="width: 700px; height: 820px; padding: 15px">
  
   <h2>Actualizare produs</h2>
<form  method="post" action="">

<br>
Titlu: <br>
<input type="text" name="denumire" class="cauta" value="<?php echo $row['denumire']; ?>">
<br>
Descriere:<br>
<textarea name="descriere" rows="10" cols="40"><?php echo $row['descriere']; ?></textarea>
<br>
Bucati:<br>
<input type="text" name="bucati" class="cauta" value="<?php echo $row['bucati']; ?>">
<br>
Pret:<br>
<input type="text" name="pret" class="cauta" value="<?php echo $row['pret']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Modifica" class="button butonok">
<a href="vizualizare1.php" class="butonok button">Inapoi</a>
</form>

</div>

<br>
<br>
<br>
<?php
include('footer.php');
?>