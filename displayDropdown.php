<?php
/**
 * Created by IntelliJ IDEA.
 * User: joshuaclark
 * Date: 7/30/16
 * Time: 2:22 PM
 */

include_once('../config.php');

$instructorArray = array();
$rooms = array();
$courseArray = array();

displayAllInstructors();
displayAllCourses();
displayAllRooms();

function displayAllInstructors()
{
    //database conenction
    $dbh = dbConnect();

//queries
    $sql = "SELECT * FROM instructor ORDER BY last_name ASC";


//lets prepare the queries
    $statement = $dbh->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    global $instructorArray;

    foreach ($result as $row) {

        //add each element from the database into the array
        $instructorArray[] = array(
            'instructor_id' => $row['instructor_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name']
        );
    }


    $dbh = null;
}

function displayAllCourses()
{

    $dbh = dbConnect();

    $sql = "SELECT * FROM course ORDER BY course_number ASC";

    $statement = $dbh->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    global $courseArray;

    foreach ($result as $row) {
        $courseArray[] = array(
            'course_id' => $row['course_id'],
            'course_number' => $row['course_number']
        );
    }


    $dbh = null;

}

function displayAllRooms()
{

    $dbh = dbConnect();

    $sql = "SELECT * FROM room ORDER BY room_number ASC";

    $statement = $dbh->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    global $rooms;

    foreach ($result as $row) {
        $rooms[] = array(
            'room_id' => $row['room_id'],
            'room_number' => $row['room_number']
        );
    }

    $dbh = null;

}

echo json_encode(array($instructorArray, $courseArray, $rooms));





