<?php
include_once('../config.php');
if(isset($_SESSION['username'])) { ?>
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
                <input class="validate" id="first-name" name="first-name" type="text" required>
                <label for="first-name">First Name</label>
              </div>
              <!--Last Name-->
              <div class="col s5 input-field">
                <input class="validate" id="last-name" name="last-name" type="text" required>
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
        <ul class="collection" id="instructor-delete-list">
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

<?php

if(isset($_POST['submit-instructor-btn']) && isset($_POST['first-name']) && isset($_POST['last-name'])) {
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];

  addInstructor($first_name, $last_name);

  unset($_POST['first-name']);
  unset($_POST['last-name']);
}

function dbQuery($sql, $first_name, $last_name) {

  $dbh = dbConnect();

  $statement = $dbh->prepare($sql);

  $statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);

  $statement->execute();

  $dbh = null;
}

function addInstructor($first_name, $last_name) {
  $sql = "INSERT INTO `instructor` (`instructor_id`, `first_name`, `last_name`) VALUES (NULL, '$first_name', '$last_name')";

  dbQuery($sql, $first_name, $last_name);
}
?>