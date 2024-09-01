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
include('securitateu.php');
?>


<br>
<br>
<br>



<!--cod php pentru stergere-->
<?php

if (isset($_POST['submit']))
{

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"bookplace");

    $id = $_SESSION["id"];
    

$result= mysqli_query($db,"CALL stergere1('$id')");


if (!$result)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
    session_destroy();
    redirect("login.php","Contul a fost sters!");
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