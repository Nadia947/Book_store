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
include 'navbar.php';
include 'myfunctions.php';

if(isset($_POST['submit'])){
    if (empty($_POST["parola_veche"])) {
        $nameErr = "Este necesar sa introduceti parola actuala.";
        echo $nameErr;
    } else {
        mysqli_query($con,"UPDATE utilizatori set parola ='" . $_POST['parola'] . "' WHERE id='" . $_SESSION['id'] . "' AND parola='" . $_POST['parola_veche'] . "'");
        if($_SESSION['role_as']==0){
          redirect("dashboardu.php", "Parola modificata!");
        }
        else{
          redirect("dashboard.php", "Parola modificata!");
        }
        }
}
    ?>

    <br>
    <div class="card float-center" style="width: 400px; height: 400px; padding: 15px">

       <h2>Schimba parola</h2>
    <form  method="post" action="">
    
    <br>
    Parola actuala: <br>
    <input type="text" name="parola_veche" class="cauta">
    <br>
    Parola noua:<br>
    <input type="text" name="parola" class="cauta">

    <br>
    <br>
    <input type="submit" name="submit" value="Confirma" class="button butonok">
    </form>
   
    </div>
    
    <br>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>
