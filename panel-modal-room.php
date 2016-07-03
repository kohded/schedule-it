<!--Add Room Modal-->
<div class="modal modal-fixed-footer" id="add-room-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Add Room</h4>
      <form action="panel-modal-room.php" class="col s12" method="POST">
        <div id="room-number">
          <div class="row">
            <!--Room Number-->
            <div class="col s10 input-field">
              <input class="validate" id="room-number" type="text" required>
              <label for="room-number">Room</label>
            </div>
            <button class="add-btn btn col s2 waves-effect waves-light green additional-room">
              <i class="material-icons">add</i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="divider"></div>
          <!--Additional Room Button-->
          <button class="add-btn btn col s12 waves-effect waves-light green additional-room">
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
            id="submit-room-btn" name="submit-room-btn" type="submit">Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Remove Room Modal-->
<div class="modal modal-fixed-footer" id="remove-room-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Remove Room</h4>
      <ul class="collection">
        <li class="collection-item">
          <div>
            AC 102
            <a href="#remove-room-modal-confirm" class="secondary-content remove-room-modal-confirm-btn">
              <i class="material-icons">remove</i>
            </a>
          </div>
        </li>
        <li class="collection-item">
          <div>
            AC 103
            <a href="#remove-room-modal-confirm" class="secondary-content remove-room-modal-confirm-btn">
              <i class="material-icons">remove</i>
            </a>
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

<!--Remove Room Modal Confirmation-->
<div class="modal modal-fixed-footer" id="remove-room-modal-confirm">
  <div class="modal-content">
    <div class="row">
      <h4>Confirm</h4>
      <p>Remove: Room Number Here</p>
    </div>
    <div class="row right">
      <!--Cancel Button-->
      <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
        Cancel
      </button>
      <!--Submit Button-->
      <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
        id="remove-room-btn" name="remove-room-btn" type="submit">Submit
      </button>
    </div>
  </div>
</div>

<?php
?>