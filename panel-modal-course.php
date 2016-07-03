<!--Add Course Modal-->
<div class="modal modal-fixed-footer" id="add-course-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Add Course</h4>
      <form action="panel-modal-course.php" class="col s12" method="POST">
        <div id="course-code">
          <div class="row">
            <!--Course Code-->
            <div class="col s10 input-field">
              <input class="validate" id="course-code" type="text" required>
              <label for="course-code">Course</label>
            </div>
            <button class="add-btn btn col s2 waves-effect waves-light green additional-course">
              <i class="material-icons">add</i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="divider"></div>
          <!--Additional Course Button-->
          <button class="add-btn btn col s12 waves-effect waves-light green additional-course">
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
            id="submit-course-btn" name="submit-course-btn" type="submit">Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Remove Course Modal-->
<div class="modal modal-fixed-footer" id="remove-course-modal">
  <div class="modal-content">
    <div class="row">
      <h4>Remove Course</h4>
      <ul class="collection">
        <li class="collection-item">
          <div>
            IT 355
            <a href="#remove-course-modal-confirm" class="secondary-content remove-course-modal-confirm-btn">
              <i class="material-icons">remove</i>
            </a>
          </div>
        </li>
        <li class="collection-item">
          <div>
            IT 405
            <a href="#remove-course-modal-confirm" class="secondary-content remove-course-modal-confirm-btn">
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

<!--Remove Course Modal Confirmation-->
<div class="modal modal-fixed-footer" id="remove-course-modal-confirm">
  <div class="modal-content">
    <div class="row">
      <h4>Confirm</h4>
      <p>Remove: Course Code Here</p>
    </div>
    <div class="row right">
      <!--Cancel Button-->
      <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
        Cancel
      </button>
      <!--Submit Button-->
      <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
        id="remove-course-btn" name="remove-course-btn" type="submit">Submit
      </button>
    </div>
  </div>
</div>

<?php
?>