<?php include('panel-modal-instructor.php'); ?>
<?php include('panel-modal-course.php'); ?>
<?php include('panel-modal-room.php'); ?>

<div id="panel" class="side-nav">
  <div class="row">
    <form class="col s12">
      <div class="row">
        <!--Campus-->
        <div class="input-field col s12">
          <select required>
            <option value="" disabled selected>Select</option>
            <option value="auburn">Auburn</option>
            <option value="kent">Kent</option>
          </select>
          <label>Campus</label>
        </div>
      </div>
      <!--Instructor-->
      <div class="row">
        <div class="col s9 input-field">
          <select>
            <option value="" disabled selected>Select</option>
            <option value="tina-ostrander">Tina Ostrander</option>
            <option value="josh-archer">Josh Archer</option>
          </select>
          <label>Instructor</label>
        </div>
        <button class="add-btn btn-floating waves-effect waves-light green"
          href="#add-instructor-modal" id="add-instructor-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn-floating remove-btn waves-effect waves-light red"
          href="#remove-instructor-modal" id="remove-instructor-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>
      <!--Course-->
      <div class="row">
        <div class="input-field col s9">
          <select>
            <option value="" disabled selected>Select</option>
            <option value="it355">IT 355</option>
            <option value="it405">IT 405</option>
          </select>
          <label>Course</label>
        </div>
        <button class="add-btn btn-floating waves-effect waves-light green"
          href="#add-course-modal" id="add-course-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn-floating remove-btn waves-effect waves-light red"
          href="#remove-course-modal" id="remove-course-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>
      <!--Room-->
      <div class="row">
        <div class="input-field col s9">
          <select>
            <option value="" disabled selected>Select</option>
            <option value="ac102">AC 102</option>
            <option value="ac103">AC 103</option>
          </select>
          <label>Room</label>
        </div>
        <button class="add-btn btn-floating waves-effect waves-light green"
          href="#add-room-modal" id="add-room-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn-floating remove-btn waves-effect waves-light red"
          href="#remove-room-modal" id="remove-room-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>
      <!--Start Date-->
      <div class="row">
        <div class="input-field col s12">
          <label for="start-date">Start Date</label>
          <input type="date" class="datepicker" id="start-date">
        </div>
      </div>
      <!--End Date-->
      <div class="input-field col s12">
        <label for="end-date">End Date</label>
        <input type="date" class="datepicker" id="end-date">
      </div>
      <!--Days-->
      <div class="row">
        <div class="input-field col s12">
          <select multiple>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
          </select>
          <label>Days</label>
        </div>
      </div>
      <!--Start Time-->
      <div class="row">
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Select</option>
            <option value="10">10:00 AM</option>
            <option value="10:10">10:10 AM</option>
          </select>
          <label>Start Time</label>
        </div>
      </div>
      <!--End Time-->
      <div class="row">
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Select</option>
            <option value="12:00">12:00 AM</option>
            <option value="12:10">12:10 AM</option>
          </select>
          <label>End Time</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input class="col s12 btn waves-effect waves-light green" type="submit"
            value="Submit">
        </div>
      </div>
    </form>
  </div>
</div>

<?php
?>