<?php if(isset($_SESSION['username'])) { ?>
  <!--Update Calendar Course Modal-->
  <div class="modal modal-fixed-footer" id="calendar-update-course">
    <div class="modal-content">
      <div class="row">
        <h4>Update Course</h4>
        <!--Instructor-->
        <div class="col s4 input-field">
          <select id="select-instructor-update" required>
            <option value="" disabled selected>Select</option>
            <?php displayAllInstructors(); ?>
          </select>
          <label for="select-instructor-update">Instructor</label>
        </div>
        <!--Course-->
        <div class="col s4 input-field">
          <select id="select-course-update" required>
            <option value="" disabled selected>Select</option>
            <?php displayAllCourses(); ?>
          </select>
          <label for="select-course-update">Course</label>
        </div>
        <!--Room-->
        <div class="col s4 input-field">
          <select id="select-room-update" required>
            <option value="" disabled selected>Select</option>
            <?php displayAllRooms(); ?>
          </select>
          <label for="select-room-update">Room</label>
        </div>
      </div>
      <div class="row right">
        <!--Cancel Button-->
        <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
          Cancel
        </button>
        <!--Delete Button-->
        <button class="btn modal-action modal-btn-delete waves-effect waves-red green" id="delete-course-btn">
          Delete
        </button>
        <!--Update Button-->
        <button class="btn modal-action modal-btn-update waves-effect waves-light green" id="update-course-btn">
          Update
        </button>
      </div>
    </div>
  </div>
<?php } ?>

<?php
function displayAllInstructors() {

  $dbh = dbConnect();

  $sql = "SELECT * FROM instructor ORDER BY last_name ASC";

  $statement = $dbh->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach($result as $row) {
    echo "<option value=\"" . $row['instructor_id'] . "\">" . $row['first_name'] . ' ' . $row['last_name'] . "</option>";
  }
  $dbh = null;

}

function displayAllCourses() {

  $dbh = dbConnect();

  $sql = "SELECT * FROM course ORDER BY course_number ASC";

  $statement = $dbh->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach($result as $row) {
    echo "<option value=\"" . $row['course_id'] . "\">" . $row['course_number'] . "</option>";
  }

  $dbh = null;

}

function displayAllRooms() {

  $dbh = dbConnect();

  $sql = "SELECT * FROM room ORDER BY room_number ASC";

  $statement = $dbh->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach($result as $row) {
    echo "<option value=\"" . $row['room_id'] . "\">" . $row['room_number'] . "</option>";;
  }
  $dbh = null;

}

?>