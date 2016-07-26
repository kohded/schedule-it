<div class="modal modal-fixed-footer" id="login-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Login</h4>
      <form action="index.php" class="col s12" method="post">
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