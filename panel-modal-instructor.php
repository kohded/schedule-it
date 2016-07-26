<?php if(isset($_SESSION['username'])) { ?>
  <!--Add Instructor Modal-->
  <div class="modal modal-fixed-footer" id="add-instructor-modal">
    <div class="modal-content">
      <div class="row">
        <h4>Add Instructor</h4>
        <form action="index.php" class="col s12" method="POST">
          <div id="instructor-name">
            <div class="row">
              <!--First Name-->
              <div class="col s5 input-field">
                <input class="validate" id="first-name" type="text" required>
                <label for="first-name">First Name</label>
              </div>
              <!--Last Name-->
              <div class="col s5 input-field">
                <input class="validate" id="last-name" type="text" required>
                <label for="last-name">Last Name</label>
              </div>
              <button class="add-btn btn col s2 waves-effect waves-light green additional-instructor">
                <i class="material-icons">add</i>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="divider"></div>
            <!--Additional Instructor Button-->
            <button class="add-btn btn col s12 waves-effect waves-light green additional-instructor">
              <i class="material-icons">add</i>
            </button>
          </div>
          <div class="row right">
            <!--Cancel Button-->
            <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
              Cancel
            </button>
            <!--Submit Button-->
            <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
              id="submit-instructor-btn" name="submit-instructor-btn" type="submit">Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--Remove Instructor Modal-->
  <div class="modal modal-fixed-footer" id="remove-instructor-modal">
    <div class="modal-content">
      <div class="row">
        <h4>Remove Instructor</h4>
        <ul class="collection">
          <li class="collection-item">
            <div>
              Josh Archer
              <a href="#remove-instructor-modal-confirm" class="secondary-content remove-instructor-modal-confirm-btn">
                <i class="material-icons">remove</i></a>
            </div>
          </li>
          <li class="collection-item">
            <div>
              Tina Ostrander
              <a href="#remove-instructor-modal-confirm" class="secondary-content remove-instructor-modal-confirm-btn">
                <i class="material-icons">remove</i></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="row right">
        <!--Cancel Button-->
        <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
          Cancel
        </button>
      </div>
    </div>
  </div>
  
  <!--Remove Instructor Modal Confirmation-->
  <div class="modal modal-fixed-footer" id="remove-instructor-modal-confirm">
    <div class="modal-content">
      <div class="row">
        <h4>Confirm</h4>
        <p>Remove: Instructor Name Here</p>
      </div>
      <div class="row right">
        <!--Cancel Button-->
        <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
          Cancel
        </button>
        <!--Submit Button-->
        <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
          id="remove-instructor-btn" name="remove-instructor-btn" type="submit">Submit
        </button>
      </div>
    </div>
  </div>
<?php } ?>