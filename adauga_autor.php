
<?php 
require_once("connection.php");
include('header.php');
include('navbar.php'); 
include('securitate.php');
?>

<br>
<br>
<br>

<!--adauga autori noi-->
<div class="card float-center" style="width: 500px; height: 500px;">
  <div class="card-section">

<form method="post" action="adauga_autor1.php">  
    <div class="row">
        <label>
          Prenumele autorului: <input type="text" name="prenume" class="cauta">
        </label>
        <label>
          Numele autorului: <input type="text" name="nume" class="cauta">
        </label>

        <label>  
            <button type="submit" name="submit" class="button expanded butonok">OK</button>
        </label>
    </div>
</form>
  </div>
</div>
<!--adauga autori noi-->


<br>
<br>
<br>
<?php
include('footer.php');
?>  