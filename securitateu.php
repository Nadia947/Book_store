<?php

include('myfunctions.php');

if(isset($_SESSION['auth'])){
    if($_SESSION['role_as']==1){
        redirect("dashboard.php", "Nu poti accesa aceasta pagina!");
    }
} else {
    redirect("login.php", "Autentifica-te ca sa continui!");
}

?>