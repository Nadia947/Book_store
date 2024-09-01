
<?php 
require_once("connection.php");
include('header.php');
include('navbar.php'); 
include('securitate.php');

$sqlv="SELECT id_autor, prenume, nume FROM autor"; 
$resultv= mysqli_query($db,$sqlv);

$sql="SELECT id_editura, denum FROM editura"; 
$result= mysqli_query($db,$sql);
?>



<!--adauga produse noi-->
<div class="card float-center" style="width: 800px; height: 1350px;">
  <div class="card-section">

<form method="post" action="adauga1.php">  
    <div class="row">
        <label>Categoria:
            <select name="categoria" class="cauta">
                <option value="1">Fictiune</option>
                <option value="2">Pentru copii</option>
                <option value="3">Bestseller</option>
                <option value="4">Arta</option>
                <option value="5">Hobby, timp liber</option>
                <option value="6">Istorie</option>
                <option value="7">Stiinta</option>
                <option value="8">Psihologie</option>
            </select>
        <label>
        <br>  

        <label>Titlu carte: 
          <input type="text" name="denumire" class="cauta">
        </label>
        <br>

        <label>  
          Imagine coperta: <input type="file" accept="image/jpeg,image/png" name="imagine" id="file" />  <!--aici nu stiu cu imaginea-->            
        </label>
        <br>

        <label>
          Descriere: <textarea name="descriere" rows="10" cols="40"></textarea>
        </label>
        <br>
    
        <label>
          Numarul total de bucati: <input type="text" name="bucati" class="cauta" >
        </label>
        <br> 
    
        <label>
          Pretul pentru o carte: <input type="text" name="pret" class="cauta">
        </label>
        <br>

        <label>
          Numarul de pagini: <input type="text" name="nr_pagini" class="cauta">
        </label>
        <br>

        <label>
            Limba:
            <select name="limba" class="cauta">
              <option value="Romana">Romana</option>
              <option value="Engleza">Engleza</option>
              <option value="Franceza">Franceza</option>
              <option value="Italiana">Italiana</option>
            </select>
        </label>
        <br> 

        <label>
            Editura:
            <select name="editura" class="cauta">
            <?php  while ($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
              <option value="<?php echo $myrow["id_editura"];?>"><?php echo $myrow["denum"];?></option>
        <?php } ?> 
            </select>
        </label>
        <br> 

        <label>
            Autor:
            <select name="autor" class="cauta" >
        <?php  while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC)){ ?>
              <option value="<?php echo $myrow["id_autor"];?>"><?php echo $myrow["prenume"];?> <?php echo $myrow["nume"];?></option>
        <?php } ?> 
            </select>
        </label>
        <br> 
    
        <label>  
            <button type="submit" name="submit" class="button expanded butonok">OK</button>
        </label>
        <br>
        <br>

    </div>
</form>
</div>
</div>
<!--adauga produse noi-->


<br>
<br>
<br>
<?php
include('footer.php');
?>