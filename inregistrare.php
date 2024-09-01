<?php 
session_start();
if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Ești deja autentificat!";
    header('Location: dashboardu.php');
    exit();
}
include('header.php');
include('navbar.php') ?>
<script>
function check_email() {
dotpos=document.formular.email.value.lastIndexOf(".");
  atpos=document.formular.email.value.indexOf("@");
  if (atpos<1 ||dotpos-atpos<2) {
	alert ('Adresa de email este invalidă!');
   	return false;}
}

</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="callout alert" data-closable>
                <strong>Atenție!</strong> <?= $_SESSION['message'];?>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <?php } unset($_SESSION['message']); ?>



<!--signup-->
<br>
<div class="card float-center" style="width: 600px; height: 950px;">
  <div class="card-section">
    <h3>Sign in</h3>

    <form action="authcode.php" method="POST" onsubmit="return check_email(this);" name="formular">
      <div class="row">
        <label>Nume 
          <input type="text" name="nume" placeholder="Introdu numele tau" class="cauta">
        </label>
        <label>Prenume 
          <input type="text" name="prenume" placeholder="Introdu prenumele tau" class="cauta">
        </label>
        <label>E-mail 
          <input type="text" name="email" placeholder="Introdu adresa ta de e-mail" class="cauta">
        </label>
        <label>Strada 
          <input type="text" name="strada" placeholder="Introdu denumirea strazii" class="cauta">
        </label>
        <label>Numarul 
          <input type="text" name="numarul" placeholder="Introdu numarul de casa" class="cauta">
        </label>
        <label>Localitate
          <input type="text" name="localitate" placeholder="Introdu localitatea" class="cauta">
        </label>
        <label>Judet 
          <input type="text" name="judet" placeholder="Introdu judetul" class="cauta">
        </label>
        <label>Telefon 
          <input type="text" name="telefon" placeholder="Introdu numarul de telefon" class="cauta">
        </label>
        <label>Parola
          <input type="password" name="parola" placeholder="Introdu o parola" class="cauta">
        </label>
        <input id="show-password" type="checkbox"><label for="show-password">Afiseaza parola</label>
        <button type="submit" name="register_btn" class="button expanded butonok">OK</button>
        <div>Ai deja un cont?<a href="index.php">Log in</a></div>
      </div> 
    </form>

    </div> 
  </div> 
</div>
<!--signup-->


              <!-- </div> -->
        </div>
    </div>
</div>
<!-- </div> -->          

<?php include('footer.php') ?>