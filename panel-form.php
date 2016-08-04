<?php
include('../config.php');

//Check if post is sent from ajax call.
if(isset($_POST['type']) || isset($_POST['campus']) || isset($_POST['instructor']) ||
  isset($_POST['course']) || isset($_POST['room']) || isset($_POST['courseDays'])
) {
  $type = $_POST['type'];
  $campus = $_POST['campus'];
  $instructor = $_POST['instructor'];
  $course = $_POST['course'];
  $room = $_POST['room'];
  $courseDays = json_decode($_POST['courseDays']);

  //Select method based on type parameter.
  switch($type) {
    case 'insertCourse' :
      insertCourse($campus, $instructor, $course, $room, $courseDays);
      break;
    default:
      break;
  }
}

function insertCourse($campus, $instructor, $course, $room, $courseDays) {
  //Connect to database
  $dbh = dbConnect();
  $insertCourse = '';

  //Iterate through courseDays array.
  for($row = 0, $size = count($courseDays); $row < $size; ++$row) {
    //Build sql insert query for campus course day.
    if($campus === 'auburn') {
      $insertCourse = 'INSERT INTO auburn_course(instructor_id, room_id, course_id, start_time, end_time) 
                        VALUES (:instructor, :room, :course, :startTime, :endTime)';
    }
    else {
      if($campus === 'kent') {
        $insertCourse = 'INSERT INTO kent_course(instructor_id, room_id, course_id, start_time, end_time) 
                            VALUES (:instructor, :room, :course, :startTime, :endTime)';
      }
    }

    //Prepare the statement.
    $statement = $dbh->prepare($insertCourse);

    //Bind the parameters.
    $statement->bindParam(':instructor', $instructor, PDO::PARAM_STR);
    $statement->bindParam(':room', $room, PDO::PARAM_STR);
    $statement->bindParam(':course', $course, PDO::PARAM_STR);
    $statement->bindParam(':startTime', $courseDays[$row][0], PDO::PARAM_STR);
    $statement->bindParam(':endTime', $courseDays[$row][1], PDO::PARAM_STR);

    //Execute campus course.
    $statement->execute();

    //Return the id of the last row that was inserted.
    $lastId = $dbh->lastInsertId();
  }

  //Return the id and campus in the success response.
  echo json_encode(array('status' => 'success', 'id' => $lastId, 'campus' => $campus));

  //Close the connection
  $dbh = null;
}

?>