function displaySelect() {
    $.ajax({
        type: 'GET',
        url: './displayDropdown.php',
        dataType: 'json',
        success: function (data) {

            for (i = 0; i < data[0].length; i++) {

                $('#select-instructor').append('<option value=' + data[0][i].instructor_id + '>' + data[0][i].first_name + ' ' + data[0][i].last_name + '</option>');
                $('#instructor-delete-list').append('<li class ="collection-item"><div>' + data[0][i].first_name + ' ' +
                    data[0][i].last_name + '<a href="" class="secondary-content remove-instructor-modal-confirm-btn"><i onclick="delete_instructor(\'' + data[0][i].instructor_id + '\')" class="material-icons">remove</i></a></div></li>');
            }
            for (j = 0; j < data[1].length; j++) {
                $('#select-course').append('<option value=' + data[1][j].course_id + '>' + data[1][j].course_number + '</option>');
                $('#remove-course-list').append('<li class="collection-item"> <div>' + data[1][j].course_number + '<a href="" class="secondary-content remove-course-modal-confirm-btn"><i onclick="delete_course(\'' + data[1][j].course_id + '\')" class="material-icons">remove</i> </a> </div> </li>');
            }
            for (k = 0; k < data[2].length; k++) {
                $('#select-room').append('<option value=' + data[2][k].room_id + '>' + data[2][k].room_number + '</option>')
                $('#remove-room-list').append('<li class="collection-item"><div>' + data[2][k].room_number + '<a href="" class="secondary-content remove-room-modal-confirm-btn"> <i onclick="delete_room(\'' + data[2][k].room_id + '\')" class="material-icons">remove</i></a> </div></li>');
            }

            $('#select-instructor').material_select();
            $('#select-course').material_select();
            $('#select-room').material_select();
        }
    });
}

function delete_instructor(id) {
  if(confirm('Are you sure to delete this instructor ?')) {
    $.ajax({
      url     : './deleting.php',
      type    : 'POST',
      data    : 'type=deleteInstructor&id=' + id,
      dataType: 'json',
      success : function(response) {

        if(response.status == 'success') {

          $('#select-instructor').material_select();
        }

      }
    });
  }
  else {
    event.preventDefault();
  }
}

function delete_course(id) {
  if(confirm('Are you sure to delete this course ?')) {
    $.ajax({
      url     : './deleting.php',
      type    : 'POST',
      data    : 'type=deleteCourse&id=' + id,
      dataType: 'json',
      success : function(response) {

        if(response.status == 'success') {

          $('#select-course').material_select();
        }

      }
    });
  }
  else {
    event.preventDefault();
  }
}

function delete_room(id) {
  if(confirm('Are you sure to delete this room ?')) {
    $.ajax({
      url     : './deleting.php',
      type    : 'POST',
      data    : 'type=deleteRoom&id=' + id,
      dataType: 'json',
      success : function(response) {

        if(response.status == 'success') {

          $('#select-room').material_select();
        }

      }
    });
  }
  else {
    event.preventDefault();
  }
}

$(document).ready(function() {
  displaySelect();
});