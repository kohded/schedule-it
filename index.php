<?php
session_start();
?>
<?php include("login/login2.php")?>
<!doctype html>
<html lang="en">
<head>
  <!--Meta-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!--CSS-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/lib/jquery/jquery-ui.min.css">
  <link rel="stylesheet" href="assets/lib/jquery/jquery-ui.theme.min.css">
  <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="assets/lib/materialize/css/materialize.min.css" media="screen">
  <link rel="stylesheet" href="assets/css/index.css">
  <!--Title-->
  <title>Schedule IT</title>
</head>
<body>
  <!--Nav-->
  <nav>
    <div class="nav-wrapper green darken-4">
      <!--Logo-->
      <a href="#" class="brand-logo left">
        <img src="assets/imgs/logo.jpg" alt="logo" class="responsive-img" id="logo"></a>
      
<!--Disable hamburger button if not logged in and flip login to logout when logged in-->      
<?php
    if(isset($_SESSION['username']))
    {
      echo '<a href="#" class="show-on-medium-and-up right" data-activates="panel" id="panel-btn">
        <i class="material-icons">menu</i></a>';
        
      echo '<a class="btn waves-effect waves-light grey darken-3" id="logout-modal-btn"
         href="login/logout2.php">Logout</a>';
    }
    else
    {
      echo '<a class="btn modal-trigger waves-effect waves-light grey darken-3" id="login-modal-btn"
        href="#login-modal">Login</a>';
    }
?>
    </div>
  </nav>

  <!--Admin Panel-->
  <div id="panel">
    <?php include('panel.php') ?>
    <?php include('panel-modal-instructor.php'); ?>
    <?php include('panel-modal-course.php'); ?>
    <?php include('panel-modal-room.php'); ?>
  </div>

  <!--Calendar Filters-->
  <div class="row">
    <!--Campus-->
    <div class="col s12 m2 input-field">
      <select id="filter-campus" name="filter-campus">
        <option value="auburn">Auburn</option>
        <option value="kent">Kent</option>
      </select>
      <label>Campus</label>
    </div>
    <!--Room-->
    <button class="btn-large waves-effect waves-light green"
      id="filter-room" name="filter-room" type="submit">by Room
      <i class="material-icons right">business</i>
    </button>
    <!--Instructor-->
    <button class="btn-large waves-effect waves-light green"
      id="filter-instructor" name="filter-instructor" type="submit">by Instructor
      <i class="material-icons right">perm_identity</i>
    </button>
  </div>

  <div class="divider"></div>

  <!--Calendar-->
  <div class="row" id="main">
    <div class="col s12">
      <div id="calendar">
      </div>
    </div>
  </div>

  <!--Scripts-->
  <script rel="text/javascript" src="assets/lib/jquery/jquery-3.0.0.min.js"></script>
  <script rel="text/javascript" src="assets/lib/fullcalendar/lib/moment.min.js"></script>
  <script rel="text/javascript" src="assets/lib/fullcalendar/fullcalendar.min.js"></script>
  <script rel="text/javascript" src="assets/lib/materialize/js/materialize.min.js"></script>
  <script rel="text/javascript" src="assets/js/index.js"></script>
  <script rel="text/javascript" src="assets/js/panel.js"></script>
  <script rel="text/javascript" src="assets/js/calendar.js"></script>
</body>
</html>