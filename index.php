<?php
include('includes/dbconnection.php');// Fetch all events from the database
$sql = "SELECT * FROM tblevent ORDER BY event_date ASC";
$query = $dbh->prepare($sql);
$query->execute();
$events = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
    <div class="container-scroller">
        <?php @include("includes/user/header.php"); ?>

        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center my-4">Upcoming Events</h2>

                            <div class="row">
                                <?php if (count($events) > 0): ?>
                                    <?php foreach ($events as $event): ?>
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <img src="assets/img/events/<?php echo htmlspecialchars($event->event_image); ?>" class="card-img-top" alt="Event Image" style="height: 200px; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($event->event_name); ?></h5>
                                                    <p class="card-text">
                                                        <strong>Date:</strong> <?php echo htmlspecialchars(date('F j, Y', strtotime($event->event_date))); ?><br>
                                                        <strong>Time:</strong> <?php echo htmlspecialchars($event->event_time); ?><br>
                                                        <strong>Venue:</strong> <?php echo htmlspecialchars($event->event_venue); ?><br>
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Status:</strong> <span class="badge <?php echo $event->event_status == 'Completed' ? 'badge-secondary' : ($event->event_status == 'Ongoing' ? 'badge-primary' : 'badge-success'); ?>">
                                                            <?php echo htmlspecialchars($event->event_status); ?>
                                                        </span>
                                                    </p>
                                                    <a href="event-details.php?id=<?php echo $event->id; ?>" class="btn btn-info">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No events available at the moment.</p>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php @include("includes/footer.php"); ?>
            </div>
        </div>
    </div>
</body>

</html>