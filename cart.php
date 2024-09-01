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

<img src="img/cart.jpg" class="float-center">

<br>

<h3 class="text-center" style="color: grey;">Cosul de cumparaturi este gol!</h3>

<a href="cumpara2.php"><button type="button" class="butonok large button float-center">Cumpara acum</button></a>

<br>
<br>
<br>
<br> 
<br>
<br>
<br> 

<?php
include('footer.php');
?>