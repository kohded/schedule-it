<?php
include('../config.php');

//Check if post is sent from ajax call.
if(isset($_POST['type']) || isset($_POST['campus']) || isset($_POST['filter'])) {
  $type = $_POST['type'];
  $campus = $_POST['campus'];
  $filter = $_POST['filter'];

  //Select method based on type parameter.
  switch($type) {
    case 'selectCampusCourses' :
      selectCampusCourses();
      break;
    default:
      break;
  }
}

/**
 * Get all scheduled courses for Auburn or Kent courses.
 */
function selectCampusCourses() {
  global $campus;
  global $filter;

  // Concatenate $campus to values in statement to dynamically change between Auburn and Kent.
  $campusCourse = $campus . '_course';
  $campusCourseId = $campus . '_course_id';
  // $campusCourseDay = $campus . '_course_day';

  // Dynamically change the ORDER BY value based on what filter button was clicked.
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
    $campusCourse.start_time, $campusCourse.end_time
    FROM $campusCourse
    INNER JOIN instructor ON $campusCourse.instructor_id = instructor.instructor_id
    INNER JOIN course ON $campusCourse.course_id = course.course_id
    INNER JOIN room ON $campusCourse.room_id = room.room_id
    ORDER BY $filterVal ASC";

  // Connect to database.
  $dbh = dbConnect();
  $statement = $dbh->prepare($stmt);
  $statement->execute();

  // Process the results.
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  selectCampusCoursesResults($result, $campusCourseId);

  // Close the connection.
  $dbh = null;
}

function selectCampusCoursesResults($result, $id) {
  global $filter;
  $filterTemp = '';
  $courses = array();
  $coursesTemp = array();

  foreach($result as $row) {
    $course = array();
    $course['id'] = $row[$id];
    $course['title'] = ($filter === 'room') ? $row['room_number'] : $row['first_name'] . ' ' . $row['last_name'];
    $course['courseNumber'] = $row['course_number'];
    $course['instructor'] = $row['first_name'] . ' ' . $row['last_name'];
    $course['roomNumber'] = $row['room_number'];
    $course['start'] = $row['start_time'];
    $course['end'] = $row['end_time'];
    
    // Set initial filterTemp if empty. Stores the previous value when grouping by instructor or room.
    if(!$filterTemp) {
      if($filter === 'room') {
        $filterTemp = $row['room_number'];
      }
      elseif($filter === 'instructor') {
        $filterTemp = $row['last_name'];
      }
    }

    // If the same room or instructor when comparing filterTemp to the current row.
    if($filterTemp === $row['room_number'] || $filterTemp === $row['last_name']) {
      // Add course array to coursesTemp array of the current row.
      $coursesTemp[] = $course;
    }
    // If not the same room or instructor when comparing filterTemp to the current row.
    else {
      // Add coursesTemp with the same room or instructor to the courses array.
      $courses[] = $coursesTemp;
      // Clear coursesTemp to store the next rooms or instructor that are the same.
      unset($coursesTemp);
      // Add course array to coursesTemp array of the current row.
      $coursesTemp[] = $course;

      // Reset filterTemp to the new room or instructor of the current row.
      if($filter === 'room') {
        $filterTemp = $row['room_number'];
      }
      elseif($filter === 'instructor') {
        $filterTemp = $row['last_name'];
      }
    }
  }
  
  // Adds the last group in coursesTemp array to courses array. When the foreach loop ends the last
  // coursesTemp group isn't added.
  $courses[] = $coursesTemp;
  unset($coursesTemp);

  // Output json encode of courses.
  echo json_encode($courses);
}

?>