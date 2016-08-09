<?php
include_once('../config.php');
if (isset($_SESSION['username'])) { ?>
    <!--Add Room Modal-->
    <div class="modal modal-fixed-footer" id="add-room-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Add Room</h4>
                <form action="" class="col s12" method="POST">
                    <div id="room-number">
                        <div class="row">
                            <!--Room Number-->
                            <div class="col s10 input-field">
                                <input class="validate" id="room-number" name="room-number" type="text" required>
                                <label for="room-number">Room</label>
                            </div>
                            <button class="add-btn btn col s2 waves-effect waves-light green additional-room">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="divider"></div>
                        <!--Additional Room Button-->
                        <button class="add-btn btn col s12 waves-effect waves-light green additional-room">
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
                                id="submit-room-btn" name="submit-room-btn" type="submit">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Remove Room Modal-->
    <div class="modal modal-fixed-footer" id="remove-room-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Remove Room</h4>
                <ul class="collection" id="remove-room-list">
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

    <!--Remove Room Modal Confirmation-->
    <div class="modal modal-fixed-footer" id="remove-room-modal-confirm">
        <div class="modal-content">
            <div class="row">
                <h4>Confirm</h4>
                <p>Remove: Room Number Here</p>
            </div>
            <div class="row right">
                <!--Cancel Button-->
                <button class="btn modal-action modal-btn-cancel modal-close waves-effect waves-red green">
                    Cancel
                </button>
                <!--Submit Button-->
                <button class="btn modal-action modal-btn-submit waves-effect waves-light green"
                        id="remove-room-btn" name="remove-room-btn" type="submit">Submit
                </button>
            </div>
        </div>
    </div>
<?php } ?>

<?php

if (isset($_POST['submit-room-btn']) && isset($_POST['room-number'])) {
    $room_number = $_POST['room-number'];

    addRoom($room_number);

    unset($_POST['room-number']);

}

function roomQuery($sql, $room_number)
{

    $dbh = dbConnect();

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':room_number', $room_number, PDO::PARAM_STR);

    $statement->execute();

    $dbh = null;
}

function addRoom($room_number)
{
    $sql = "INSERT INTO `room` (`room_id`, `room_number`) VALUES (NULL, '$room_number')";

    roomQuery($sql, $room_number);
}

?>
