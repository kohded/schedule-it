<?php
include('../config.php');

$type = $_POST['type'];
$campus = $_POST['campus'];
$filter = $_POST['filter'];

switch($type) {
  case ($type === 'selectCampusCourses') :
    selectCampusCourses();
    break;
  default:
    break;
}

/**
 * Get all scheduled courses for Auburn or Kent courses.
 */
function selectCampusCourses() {
  global $campus;
  global $filter;

  //Concatenate $campus to values in statement to dynamically change between Auburn and Kent.
  $campusCourse = $campus . '_course';
  $campusCourseId = $campus . '_course_id';
  $campusCourseDay = $campus . '_course_day';
  
  //Dynamically change the ORDER BY value based on what filter button was clicked.
  $filterVal = '';
  if($filter === 'room') {
    $filterVal = 'room.room_number';
  }
  elseif($filter === 'instructor') {
    $filterVal = 'instructor.last_name';
  }

  $stmt = "SELECT
    $campusCourse.$campusCourseId,
    instructor.first_name, instructor.last_name,
    course.course_number,
    room.room_number,
    $campusCourseDay.start_time, $campusCourseDay.end_time
    FROM $campusCourse
    INNER JOIN instructor ON $campusCourse.instructor_id = instructor.instructor_id
    INNER JOIN course ON $campusCourse.course_id = course.course_id
    INNER JOIN room ON $campusCourse.room_id = room.room_id
    INNER JOIN $campusCourseDay ON $campusCourse.$campusCourseId= $campusCourseDay.$campusCourseId
    ORDER BY $filterVal ASC";

  //Connect to database.
  $dbh = dbConnect();
  $statement = $dbh->prepare($stmt);
  $statement->execute();

  //Process the results.
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  selectCampusCoursesResults($result, $campusCourseId);

  //Close the connection.
  $dbh = null;
}

function selectCampusCoursesResults($result, $id) {
  $courses = array();
  
  //Iterate through results.
  foreach($result as $row) {
    $e = array();
    $e['id'] = $row[$id];
    $e['title'] = $row['course_number'];
    $e['instructor'] = $row['first_name'] . ' ' . $row['last_name'];
    $e['roomNumber'] = $row['room_number'];
    $e['start'] = $row['start_time'];
    $e['end'] = $row['end_time'];

    $courses[] = $e;
  }

  //Output json encode of courses.
  echo json_encode($courses);
}

?>