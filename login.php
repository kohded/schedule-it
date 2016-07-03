<!--Login Modal-->
<div class="modal modal-fixed-footer" id="login-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Login</h4>
      <form class="col s12">
        <!--Username-->
        <div class="row">
          <div class="col s12 input-field">
            <input class="validate" id="username" type="text">
            <label for="username">Username</label>
          </div>
        </div>
        <!--Password-->
        <div class="row">
          <div class="col s12 input-field">
            <input class="validate" id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row right">
          <!--Cancel Button-->
          <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
            Cancel
          </button>
          <!--Login Button-->
          <button class="btn modal-action modal-btn-submit modal-close waves-effect waves-light green"
            id="login-btn" name="login-btn" type="submit">Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
?>