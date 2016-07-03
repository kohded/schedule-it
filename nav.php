<nav>
  <div class="nav-wrapper green darken-4">
    <!--Logo-->
    <a href="#" class="brand-logo left">
      <img src="assets/imgs/logo.jpg" alt="logo" class="responsive-img" id="logo"></a>

    <!--Admin Panel Button-->
    <a href="#" class="show-on-medium-and-up right" data-activates="panel" id="panel-btn">
      <i class="material-icons">menu</i></a>

    <!--Login Modal Button-->
    <a class="btn modal-trigger waves-effect waves-light grey darken-3" id="login-modal-btn"
      href="#login-modal">Login</a>
  </div>
</nav>

<!--Admin Panel-->
<?php include('panel.php') ?>
<!--Login Modal Form-->
<?php include('login.php') ?>

<?php
?>