<?php
/**
 * Created by IntelliJ IDEA.
 * User: gurmandhaliwal
 * Date: 8/8/16
 * Time: 4:50 PM
 */
include('../config.php');

if (isset($_POST['id']) || isset($_POST['type'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
}

switch ($type) {
    case 'deleteCourse':
        deleteCourse($id);
        break;
    case 'deleteInstructor' :
        deleteInstructor($id);
        break;
    case 'deleteRoom':
        deleteRoom($id);
        break;
    default:
        break;
}

function dbQuery($sql, $id) {

    $dbh = dbConnect();

    try {
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $delete = $statement->execute();

        if ($delete) {
            //Return the id and campus in the success response.
            echo json_encode(array('status' => 'success'));
        } else {
            //Return the id and campus in the success response.
            echo json_encode(array('status' => 'failed'));
        }
    } catch (PDOException $e) {
        echo 'PDOException : ' . $e->getMessage();
    }

    $dbh = null;
}

function deleteInstructor($id) {

    //delete instructor from foreign key table auburn_course
    $sql = "DELETE FROM `auburn_course` WHERE `instructor_id` = :id;";

    dbQuery($sql, $id);

    //delete instructor from foreign key table kent_course
    $sql = "DELETE FROM `kent_course` WHERE `instructor_id` = :id;";

    dbQuery($sql, $id);

    //delete instructor from instructor table
    $sql = "DELETE FROM `instructor` WHERE `instructor_id` = :id;";

    dbQuery($sql, $id);

}

function deleteCourse($id){
    //delete course from foreign key table auburn_course
    $sql = "DELETE FROM `auburn_course` WHERE `course_id` = :id;";

    dbQuery($sql, $id);

    //delete course from foreign key table kent_course
    $sql = "DELETE FROM `kent_course` WHERE `course_id` = :id;";

    dbQuery($sql, $id);

    //delete instructor from course table
    $sql = "DELETE FROM `course` WHERE `course_id` = :id;";

    dbQuery($sql, $id);
}

function deleteRoom($id){
    //delete course from foreign key table auburn_course
    $sql = "DELETE FROM `auburn_course` WHERE `room_id` = :id;";

    dbQuery($sql, $id);

    //delete course from foreign key table kent_course
    $sql = "DELETE FROM `kent_course` WHERE `room_id` = :id;";

    dbQuery($sql, $id);

    //delete instructor from course table
    $sql = "DELETE FROM `room` WHERE `room_id` = :id;";

    dbQuery($sql, $id);
}
?>