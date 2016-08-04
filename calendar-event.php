<?php
include('../config.php');

//Check if post is sent from ajax call.
if(isset($_POST['type']) || isset($_POST['campus']) || isset($_POST['eventId']) ||
  isset($_POST['start']) || isset($_POST['end'])) {
  $type = $_POST['type'];
  $campus = $_POST['campus'];
  $eventId = $_POST['eventId'];
  $start = $_POST['start'];
  $end = $_POST['end'];

  // || isset($_POST['instructor']) || isset($_POST['course']) || isset($_POST['room'])
  // $instructor = $_POST['instructor'];
  // $course = $_POST['course'];
  // $room = $_POST['room'];

  //Select method based on type parameter.
  switch($type) {
    case 'updateStartEnd' :
      updateStartEnd($campus, $eventId, $start, $end);
      break;
    default:
      break;
  }
}

function updateStartEnd($campus, $eventId, $start, $end) {
  //Connect to database
  $dbh = dbConnect();
  $updateStartDate = '';

  //Build sql insert query for campus course.
  if($campus === 'auburn') {
    $updateStartDate = 'UPDATE auburn_course SET start_time = :start, end_time= :end WHERE auburn_course_id = :eventId';
  }
  else {
    if($campus === 'kent') {
      $updateStartDate = 'UPDATE kent_course SET start_time = :start, end_time= :end WHERE kent_course_id = :eventId';
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