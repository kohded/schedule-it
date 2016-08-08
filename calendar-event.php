<?php
include('../config.php');

//Check if post is sent from ajax call.
if(isset($_POST['type']) || isset($_POST['campus']) || isset($_POST['eventId'])) {
  $type = $_POST['type'];
  $campus = $_POST['campus'];
  $eventId = $_POST['eventId'];
}
//Update course
if(isset($_POST['instructor']) || isset($_POST['course']) || isset($_POST['room'])) {
  $instructor = $_POST['instructor'];
  $course = $_POST['course'];
  $room = $_POST['room'];
}
//Update start and end time
if(isset($_POST['start']) || isset($_POST['end'])) {
  $start = $_POST['start'];
  $end = $_POST['end'];
}

//Select method based on type parameter.
switch($type) {
  case 'updateCourse':
    // echo json_encode(array('status' => 'success'));
    updateCourse($campus, $eventId, $instructor, $course, $room);
    break;
  case 'updateStartEnd' :
    updateStartEnd($campus, $eventId, $start, $end);
    break;
  case 'deleteCourse':
    deleteCourse($campus, $eventId);
    break;
  default:
    break;
}

function deleteCourse($campus, $eventId) {
  //Connect to database
  $dbh = dbConnect();
  $deleteCourse = '';

  //Build sql update query for instructor, course, room.
  if($campus === 'auburn') {
    $deleteCourse = 'DELETE FROM auburn_course WHERE auburn_course_id=:eventId';
  }
  else {
    if($campus === 'kent') {
      $deleteCourse = 'DELETE FROM kent_course WHERE kent_course_id=:eventId';
    }
  }

  //Prepare the statement.
  $statement = $dbh->prepare($deleteCourse);
  //Bind the parameters
  $statement->bindParam(':eventId', $eventId, PDO::PARAM_STR);

  //Execute campus course.
  $delete = $statement->execute();
  
  if($delete) {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'success'));
  }
  else {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'failed'));
  }

  //Close the connection
  $dbh = null;
}

function updateCourse($campus, $eventId, $instructor, $course, $room) {
  //Connect to database
  $dbh = dbConnect();
  $updateCourse = '';

  //Build sql update query for instructor, course, room.
  if($campus === 'auburn') {
    $updateCourse = 'UPDATE auburn_course SET instructor_id=:instructor, room_id=:room, course_id=:course WHERE auburn_course_id=:eventId';
  }
  else {
    if($campus === 'kent') {
      $updateCourse = 'UPDATE kent_course SET instructor_id=:instructor, room_id=:room, course_id=:course WHERE kent_course_id=:eventId';
    }
  }

  //Prepare the statement.
  $statement = $dbh->prepare($updateCourse);
  //Bind the parameters
  $statement->bindParam(':eventId', $eventId, PDO::PARAM_STR);
  $statement->bindParam(':instructor', $instructor, PDO::PARAM_STR);
  $statement->bindParam(':room', $room, PDO::PARAM_STR);
  $statement->bindParam(':course', $course, PDO::PARAM_STR);

  //Execute campus course.
  $update = $statement->execute();

  if($update) {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'success'));
  }
  else {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'failed'));
  }

  //Close the connection
  $dbh = null;
}

function updateStartEnd($campus, $eventId, $start, $end) {
  //Connect to database
  $dbh = dbConnect();
  $updateStartDate = '';

  //Build sql update query for course start and end.
  if($campus === 'auburn') {
    $updateStartDate = 'UPDATE auburn_course SET start_time=:start, end_time=:end WHERE auburn_course_id=:eventId';
  }
  else {
    if($campus === 'kent') {
      $updateStartDate = 'UPDATE kent_course SET start_time=:start, end_time=:end WHERE kent_course_id=:eventId';
    }
  }

  //Prepare the statement.
  $statement = $dbh->prepare($updateStartDate);
  //Bind the parameters
  $statement->bindParam(':eventId', $eventId, PDO::PARAM_STR);
  $statement->bindParam(':start', $start, PDO::PARAM_STR);
  $statement->bindParam(':end', $end, PDO::PARAM_STR);

  //Execute campus course.
  $update = $statement->execute();

  if($update) {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'success'));
  }
  else {
    //Return the id and campus in the success response.
    echo json_encode(array('status' => 'failed'));
  }

  //Close the connection
  $dbh = null;
}

?>