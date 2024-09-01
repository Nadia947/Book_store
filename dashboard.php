
<?php

require_once("connection.php");
include 'header.php';
include 'navbar.php';
//include('meniu.php');

include('securitate.php');
?>


    <br>
    <br>
    <br>

<div class="callout large clearfix float-center" style="width: 700px">
  
    <div class="row">
    
    <h3>Bine ai venit, <?php echo$_SESSION["prenume"] ?>!</h3>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <a href="logout.php" class="butonok button">Logout</a><br>
    <a href="update_parola.php">Schimba parola</a>
    </div>
  
</div>

 



<?php include 'footer.php'; ?>

