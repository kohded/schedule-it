<?php # login_page.inc.php
//// This page prints any errors associated with logging in
//// and it creates the entire login page, including the form.
//
//// Print any error messages, if they exist:
// if (isset($errors) && !empty($errors)) {
// echo '<h1>Error!</h1>
// <p class="error">The following error(s) occurred:<br />';
// foreach ($errors as $msg) {
//	echo " - $msg<br />\n";
// }
//	echo '</p><p>Please try again.</p>';
// }
// ?>
<!--Login Modal-->
<div class="modal modal-fixed-footer" id="login-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Login</h4>
      <form class="col s12" method="post" action="">
        <!--Username-->
        <div class="row">
          <div class="col s12 input-field">
            <input class="validate" id="username" type="text" name="user" required>
            <label for="username">Username</label>
          </div>
        </div>
        <!--Password-->
        <div class="row">
          <div class="col s12 input-field">
            <input class="validate" id="password" type="password" name="pass" required>
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row right">
          <!--Cancel Button-->
          <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
            Cancel
          </button>
          <!--Login Button-->
          <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
             type="submit" name="send" id="send">Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>