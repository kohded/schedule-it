<?php
include_once('../config.php');
if(isset($_SESSION['username'])) { ?>
  <!--Admin Panel-->
  <div class="row">
    <!--<form id="course-form" method="post">-->
    <div class="row">
      <!--Campus-->
      <div class="input-field col s4">
        <select id="select-campus" required>
          <option value="auburn">Auburn</option>
          <option value="kent">Kent</option>
        </select>
        <label for="select-campus">Campus</label>
      </div>
      <!--Quarter-->
      <!--Season-->
      <div class="input-field col s4">
        <select id="select-quarter-season" required>
          <option value="fall">Fall</option>
          <option value="spring">Spring</option>
          <option value="winter">Winter</option>
          <option value="summer">Summer</option>
        </select>
        <label for="select-quarter-season">Quarter</label>
      </div>
      <!--Year-->
      <div class="input-field col s4">
        <select id="select-quarter-year" required>
          <option id="quarter-year-current"></option>
          <option id="quarter-year-second"></option>
          <option id="quarter-year-third"></option>
        </select>
        <label for="select-quarter-year">Year</label>
      </div>
    </div>

    <!--Divider-->
    <div class="row">
      <div class=" col s12">
        <div class="divider "></div>
      </div>
    </div>

    <div class="row">
      <!--Instructor-->
      <div class="col s2 input-field">
        <select id="select-instructor" required>
          <option value="" disabled selected>Select</option>
        </select>
        <label for="select-instructor">Instructor</label>
      </div>
      <div class="col s2">
        <button class="add-btn btn col s6 waves-effect waves-light green"
          href="#add-instructor-modal" id="add-instructor-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn col s6 remove-btn waves-effect waves-light red"
          href="#remove-instructor-modal" id="remove-instructor-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>

      <!--Course-->
      <div class="input-field col s2">
        <select id="select-course" required>
          <option value="" disabled selected>Select</option>
        </select>
        <label for="select-course">Course</label>
      </div>
      <div class="col s2">
        <button class="add-btn btn col s6 waves-effect waves-light green"
          href="#add-course-modal" id="add-course-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn col s6 remove-btn waves-effect waves-light red"
          href="#remove-course-modal" id="remove-course-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>

      <!--Room-->
      <div class="input-field col s2">
        <select id="select-room" required>
          <option value="" disabled selected>Select</option>
        </select>
        <label for="select-room">Room</label>
      </div>
      <div class="col s2">
        <button class="add-btn btn col s6 waves-effect waves-light green"
          href="#add-room-modal" id="add-room-modal-btn">
          <i class="material-icons">add</i></button>
        <button class="btn col s6 remove-btn waves-effect waves-light red"
          href="#remove-room-modal" id="remove-room-modal-btn">
          <i class="material-icons">remove</i></button>
      </div>
    </div>

    <!--Divider-->
    <div class="row">
      <div class=" col s12">
        <div class="divider "></div>
      </div>
    </div>

    <div id="days">
      <div id="day-0">
        <div class="row">
          <!--Course Days/Time-->
          <!--Days Select-->
          <div class="input-field col s4">
            <select id="select-d" class="select-days" multiple required>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
            </select>
            <label for="select-d">Day(s)</label>
          </div>
          <!--Start Time-->
          <!--Hour-->
          <div class="input-field col s2">
            <select id="select-s-h" class="select-start-hour" required>
              <option value="08">8 AM</option>
              <option value="09">9 AM</option>
              <option value="10">10 AM</option>
              <option value="11">11 AM</option>
              <option value="12">12 PM</option>
              <option value="13">1 PM</option>
              <option value="14">2 PM</option>
              <option value="15">3 PM</option>
              <option value="16">4 PM</option>
              <option value="17">5 PM</option>
              <option value="18">6 PM</option>
              <option value="19">7 PM</option>
              <option value="20">8 PM</option>
              <option value="21">9 PM</option>
            </select>
            <label for="select-s-h">Start Time (Hour)</label>
          </div>
          <!--Minute-->
          <div class="input-field col s2">
            <select id="select-s-m" class="select-start-minute" required>
              <option value="00">00</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="40">40</option>
              <option value="50">50</option>
            </select>
            <label for="select-s-m">Start Time (Minute)</label>
          </div>

          <!--End Time-->
          <!--Hour-->
          <div class="input-field col s2">
            <select id="select-e-h" class="select-end-hour" required>
              <option value="08">8 AM</option>
              <option value="09">9 AM</option>
              <option value="10">10 AM</option>
              <option value="11">11 AM</option>
              <option value="12">12 PM</option>
              <option value="13">1 PM</option>
              <option value="14">2 PM</option>
              <option value="15">3 PM</option>
              <option value="16">4 PM</option>
              <option value="17">5 PM</option>
              <option value="18">6 PM</option>
              <option value="19">7 PM</option>
              <option value="20">8 PM</option>
              <option value="21">9 PM</option>
            </select>
            <label for="select-e-h">End Time (Hour)</label>
          </div>
          <!--Minute-->
          <div class="input-field col s2">
            <select id="select-e-m" class="select-end-minute" required>
              <option value="00">00</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="40">40</option>
              <option value="50">50</option>
            </select>
            <label for="select-e-m">End Time (Minute)</label>
          </div>
        </div>
        <!--Additional Day Button-->
        <div class="row">
          <div class="col s12">
            <button class="additional-day btn col s12 waves-effect waves-light green">
              <i class="material-icons">add</i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Divider-->
    <div class=" col s12">
      <div class="divider "></div>
    </div>

    <!--Submit Button-->
    <div class="row">
      <div class="input-field col s12">
        <button class="btn col green s12 waves-effect waves-light" id="course-submit-btn" type="submit">
          Submit
        </button>
      </div>
    </div>
    <!--</form>-->
  </div>
<?php } ?>