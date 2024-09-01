<!--bara de navigare-->

<div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
  <button class="menu-icon dark buton" type="button" data-toggle="responsive-menu"></button>
  <div class="title-bar-title">Meniu</div>
</div>

<div data-sticky-container>
<div data-sticky data-margin-top="0">

<div class="top-bar topbar-sticky-shrink" id="responsive-menu">
  <div class="top-bar-left">
    <form method="post" action="pagina_de_cautare.php">
    <ul class="menu">
      <li class="menu"><a href="book2.php"><strong>BookStore</strong></a></li>
      <li><input type="search" name="titlu" placeholder="Cauta" class="cauta"></li>
      <li><button type="submit" name="submit" class="button hollow secondary"><i class="fa-solid fa-magnifying-glass"></i></button></li>
    </ul> 
    </form>
  </div>
  <div class="top-bar-right">
    <ul class="dropdown vertical medium-horizontal menu">

      <?php if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
                <li><a href="book2.php">Acasa</a></li>
                <li><a href="cumpara2.php">Cumpara</a></li>
                <li><a href="dashboardu.php">Contul meu</a></li>
                <li><a href="favorite_log.php"><i class="fa-solid fa-heart"></i></a></li>
                <li><a href="vizualizare_cos.php"><i class="fa-solid fa-basket-shopping"></i></a></li>

            <?php } else if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) { ?>
                <li><a href="book2.php">Acasa</a></li>
                <li><a href="vizualizare1.php">Produse</a></li>
                <li><a href="vizualizare2.php">Clienti</a></li>
                <li><a href="vizualizare3.php">Autori</a></li>
                <li><a href="dashboard.php">Contul meu</a></li>

            <?php } else { ?>
                <li><a href="book2.php">Acasa</a></li>
                <li><a href="cumpara2.php">Cumpara</a></li>
                <li><a href="login.php">Contul meu</a></li>
                <li><a href="favorite.php"><i class="fa-solid fa-heart"></i></a></li>
                <li><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
            <?php }
            ?>

    </ul>
  </div>
</div>

</div>
</div>
<!--bara de navigare-->