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
        <!--Quarter-->
        <div class="row">
          <!--Season-->
          <div class="input-field col s6">
            <select>
              <option value="fall">Fall</option>
              <option value="spring">Spring</option>
              <option value="winter">Winter</option>
              <option value="summer">Summer</option>
            </select>
            <label>Quarter</label>
          </div>
          <!--Year-->
          <div class="input-field col s6">
            <select id="quarter-year">
              <option id="quarter-year-current" value="current"></option>
              <option id="quarter-year-second" value="second"></option>
              <option id="quarter-year-third" value="third"></option>
            </select>
            <label>Year</label>
          </div>
        </div>
        <!--Course Days/Time-->
        <div id="days">
          <!--Days Select-->
          <div class="row">
            <div class="input-field col s12">
              <select multiple>
                <option value="1">Monday</option>
                <option value="2">Tuesday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
              </select>
              <label>Day(s)</label>
            </div>
          </div>
          <!--Start Time-->
          <div class="row">
            <!--Hour-->
            <div class="input-field col s6">
              <select>
                <option value="" disabled selected>Select</option>
                <option value="8">8 AM</option>
                <option value="9">9 AM</option>
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
              <label>Start Time (Hour)</label>
            </div>
            <!--Minute-->
            <div class="input-field col s6">
              <select>
                <option value="" disabled selected>Select</option>
                <option value="10">00</option>
                <option value="10:10">10</option>
                <option value="10:10">20</option>
                <option value="10:10">30</option>
                <option value="10:10">40</option>
                <option value="10:10">50</option>
              </select>
              <label>Start Time (Minute)</label>
            </div>
          </div>
          <!--End Time-->
          <div class="row">
            <!--Hour-->
            <div class="input-field col s6">
              <select>
                <option value="" disabled selected>Select</option>
                <option value="8">8 AM</option>
                <option value="9">9 AM</option>
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
              <label>End Time (Hour)</label>
            </div>
            <!--Minute-->
            <div class="input-field col s6">
              <select>
                <option value="" disabled selected>Select</option>
                <option value="10">00</option>
                <option value="10:10">10</option>
                <option value="10:10">20</option>
                <option value="10:10">30</option>
                <option value="10:10">40</option>
                <option value="10:10">50</option>
              </select>
              <label>End Time (Minute)</label>
            </div>
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
        <!--Divider-->
        <div class="row">
          <div class=" col s12">
            <div class="divider "></div>
          </div>
        </div>
        <!--Submit Button-->
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