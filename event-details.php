<?php
// Include necessary files
session_start();
include('includes/dbconnection.php');

// Fetch event details from database based on the event ID
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    
    // Prepare SQL query to get event details
    $sql = "SELECT * FROM tblevent WHERE ID = :eventId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':eventId', $eventId, PDO::PARAM_INT);
    $query->execute();
    
    $event = $query->fetch(PDO::FETCH_OBJ);
    
    if (!$event) {
        echo '<script>alert("Event not found.")</script>';
        echo "<script>window.location.href = 'index.php'</script>";
    }
} else {
    echo '<script>alert("No event ID provided.")</script>';
    echo "<script>window.location.href = 'index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <title>Event Details - <?php echo htmlspecialchars($event->event_name); ?></title>
    <style>
        /* Custom Styling for the Event Detail Page */
        .event-header {
            background-image: url('assets/img/events/<?php echo htmlspecialchars($event->event_image); ?>');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .event-header h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .event-header p {
            font-size: 1.25rem;
        }
        .event-details {
            padding: 30px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: -60px;
            z-index: 1;
        }
        .event-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .event-info div {
            flex: 1 1 calc(50% - 20px);
        }
        .event-info div span {
            font-weight: bold;
        }
        .event-description {
            margin-top: 20px;
        }
        .event-description p {
            font-size: 1rem;
            line-height: 1.6;
        }
        .event-footer {
            margin-top: 40px;
            text-align: center;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include('includes/user/header.php'); ?>

    <!-- Event Header Section -->
    <div class="event-header">
        <h1><?php echo htmlspecialchars($event->event_name); ?></h1>
        <p><?php echo htmlspecialchars($event->event_venue); ?></p>
        <p><strong><?php echo date('F j, Y', strtotime($event->event_date)); ?> | <?php echo date('g:i A', strtotime($event->event_time)); ?></strong></p>
    </div>

    <!-- Event Details Section -->
    <div class="container event-details">
        <div class="event-info">
            <div>
                <span>Event Type:</span> <?php echo htmlspecialchars($event->event_type); ?>
            </div>
            <div>
                <span>Organizer:</span> <?php echo htmlspecialchars($event->event_organizer); ?>
            </div>
            <div>
                <span>Capacity:</span> <?php echo htmlspecialchars($event->event_capacity); ?>
            </div>
            <div>
                <span>Ticket Price:</span> $<?php echo htmlspecialchars($event->event_ticket_price); ?>
            </div>
            <div>
                <span>Status:</span> <?php echo htmlspecialchars($event->event_status); ?>
            </div>
        </div>

        <!-- Event Description -->
        <div class="event-description">
            <h4>Description</h4>
            <p><?php echo nl2br(htmlspecialchars($event->event_description)); ?></p>
        </div>

        <!-- Action Buttons -->
        <div class="event-footer">
            <a href="book-ticket.php?id=<?php echo $event->id; ?>" class="btn-primary">Book Tickets</a>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
