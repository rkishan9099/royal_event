<?php
include('includes/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $eventType = $_POST['event_type'];
    $eventName = $_POST['event_name'];
    $eventDescription = $_POST['event_description'];
    $eventDate = $_POST['event_date'];
    $eventTime = $_POST['event_time'];
    $eventVenue = $_POST['event_venue'];
    $eventOrganizer = $_POST['event_organizer'];
    $eventCapacity = $_POST['event_capacity'];
    $eventTicketPrice = $_POST['event_ticket_price'];
    $eventStatus = $_POST['event_status'];
    $eventImage = $_FILES['event_image']['name'];

    // Handle image upload
    $targetDir = "assets/img/events/";
    $targetFile = $targetDir . basename($_FILES["event_image"]["name"]);
    move_uploaded_file($_FILES["event_image"]["tmp_name"], $targetFile);

    // Insert event into the database
    $sql = "INSERT INTO tblevent (event_type, event_name, event_description, event_date, event_time, event_venue, event_organizer, event_capacity, event_ticket_price, event_status, event_image) 
            VALUES (:event_type, :event_name, :event_description, :event_date, :event_time, :event_venue, :event_organizer, :event_capacity, :event_ticket_price, :event_status, :event_image)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':event_type', $eventType, PDO::PARAM_STR);
    $query->bindParam(':event_name', $eventName, PDO::PARAM_STR);
    $query->bindParam(':event_description', $eventDescription, PDO::PARAM_STR);
    $query->bindParam(':event_date', $eventDate, PDO::PARAM_STR);
    $query->bindParam(':event_time', $eventTime, PDO::PARAM_STR);
    $query->bindParam(':event_venue', $eventVenue, PDO::PARAM_STR);
    $query->bindParam(':event_organizer', $eventOrganizer, PDO::PARAM_STR);
    $query->bindParam(':event_capacity', $eventCapacity, PDO::PARAM_INT);
    $query->bindParam(':event_ticket_price', $eventTicketPrice, PDO::PARAM_STR);
    $query->bindParam(':event_status', $eventStatus, PDO::PARAM_STR);
    $query->bindParam(':event_image', $eventImage, PDO::PARAM_STR);

    if ($query->execute()) {
        echo '<script>alert("Event added successfully!")</script>';
        echo "<script>window.location.href = 'event-list.php'</script>";
    } else {
        echo '<script>alert("Failed to add event. Please try again.")</script>';
    }
}

// Fetch event types from the database
$sql = "SELECT * FROM tbleventtype";
$query = $dbh->prepare($sql);
$query->execute();
$eventTypes = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
    <div class="container-scroller">
        <?php @include("includes/header.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">Add Event</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Type:</label>
                                                <div class="col-12">
                                                    <select class="form-control" name="event_type" required>
                                                        <option value="">Select Event Type</option>
                                                        <?php
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($eventTypes as $row) {
                                                                echo '<option value="' . htmlspecialchars($row->ID) . '">' . htmlspecialchars($row->EventType) . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Name:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="event_name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Description:</label>
                                                <div class="col-12">
                                                    <textarea class="form-control" name="event_description" rows="4" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Date:</label>
                                                <div class="col-12">
                                                    <input type="date" class="form-control" name="event_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Time:</label>
                                                <div class="col-12">
                                                    <input type="time" class="form-control" name="event_time" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Venue:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="event_venue" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Organizer:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="event_organizer" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Capacity:</label>
                                                <div class="col-12">
                                                    <input type="number" class="form-control" name="event_capacity">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Ticket Price:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="event_ticket_price">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Status:</label>
                                                <div class="col-12">
                                                    <select class="form-control" name="event_status">
                                                        <option value="Upcoming">Upcoming</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12">Event Image:</label>
                                                <div class="col-12">
                                                    <input type="file" class="form-control" name="event_image" accept="image/*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Event</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php @include("includes/footer.php"); ?>
            </div>
        </div>
    </div>
    <?php @include("includes/foot.php"); ?>
</body>
</html>
