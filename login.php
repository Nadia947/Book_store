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
  if (atpos<1||dotpos-atpos<2) {
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

<!--login-->
<br>
<div class="card float-center" style="width: 500px">
  <div class="card-section">
    <h3>Log in</h3>

    <form name="formular" action="authcode.php" method="POST" onsubmit="return check_email(this);">
      <div class="row">
      <p class="hide"><input type="text" name="mode" value="loginare" ></p>
        <label>Email 
          <input type="text" name="email" placeholder="Introdu emailul" class="cauta">
        </label>
        <label>Parola
          <input type="password" name="parola" placeholder="Introdu parola" class="cauta">
        </label>
        <input id="show-password" type="checkbox"><label for="show-password">Afiseaza parola</label>
        <input type="submit" name="login_btn" class="button expanded butonok" value="OK"></input>
        <div>Nu ai cont?<a href="inregistrare.php">Sign up</a></div>
      </div> 
      <form> 

    </div> 
  </div> 
</div>
<!--login-->


        <!-- </div> -->
        </div>
    </div>
</div>
       
<?php include('footer.php') ?>
