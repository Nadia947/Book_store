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

  <body style="background: url(img/raft.jpg);">

<?php
require_once("connection.php");
include('navbar.php');
//include('meniu.php');
?>

<br>
<br>
<br>


  <div class="text-center">
    <br>
    <br>
    <br> 
    <h1 style="color: white;">Esti client nou?</h1>
    <br>
    <h3 style="color: white;">Creaza un cont si adauga produsele favorite aici!</h3>
    <a href="inregistrare.php" class="butonok button">Creaza cont</a>

  </div>

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