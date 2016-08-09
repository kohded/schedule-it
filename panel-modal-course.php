<?php
include_once('../config.php');
if (isset($_SESSION['username'])) { ?>
    <!--Add Course Modal-->
    <div class="modal modal-fixed-footer" id="add-course-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Add Course</h4>
                <form action="" class="col s12" method="POST">
                    <div id="course-code">
                        <div class="row">
                            <!--Course Code-->
                            <div class="col s10 input-field">
                                <input class="validate" id="course-number" name="course-number" type="text" required>
                                <label for="course-code">Course</label>
                            </div>
                            <button class="add-btn btn col s2 waves-effect waves-light green additional-course">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="divider"></div>
                        <!--Additional Course Button-->
                        <button class="add-btn btn col s12 waves-effect waves-light green additional-course">
                            <i class="material-icons">add</i>
                        </button>
                    </div>
                    <div class="row right">
                        <!--Cancel Button-->
                        <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
                            Cancel
                        </button>
                        <!--Submit Button-->
                        <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
                                id="submit-course-btn" name="submit-course-btn" type="submit">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Remove Course Modal-->
    <div class="modal modal-fixed-footer" id="remove-course-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Remove Course</h4>
                <ul class="collection" id="remove-course-list">
                </ul>
            </div>
            <div class="row right">
                <!--Cancel Button-->
                <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!--Remove Course Modal Confirmation-->
    <div class="modal modal-fixed-footer" id="remove-course-modal-confirm">
        <div class="modal-content">
            <div class="row">
                <h4>Confirm</h4>
                <p>Remove: Course Code Here</p>
            </div>
            <div class="row right">
                <!--Cancel Button-->
                <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
                    Cancel
                </button>
                <!--Submit Button-->
                <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
                        id="remove-course-btn" name="remove-course-btn" type="submit">Submit
                </button>
            </div>
        </div>
    </div>
<?php } ?>

<?php

if (isset($_POST['submit-course-btn']) && isset($_POST['course-number'])) {
    $course_number = $_POST['course-number'];

    addCourse($course_number);

    unset($_POST['course-number']);

}

function courseQuery($sql, $course_number)
{

    $dbh = dbConnect();

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':course_number', $course_number, PDO::PARAM_STR);

    $statement->execute();

    $dbh = null;
}

function addCourse($course_number)
{
    $sql = "INSERT INTO `course` (`course_id`, `course_number`) VALUES (NULL, '$course_number')";

    courseQuery($sql, $course_number);
}

?>

