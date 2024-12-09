<?php

include('includes/checklogin.php');
check_login();



// Code for deleting product from cart
if(isset($_GET['delid']))
{
  $rid=intval($_GET['delid']);
  $sql="delete from tblevent where id=:rid";
  $query=$dbh->prepare($sql);
  $query->bindParam(':rid',$rid,PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'event-list.php'</script>";
}

// Fetch Events Logic
$sql = "SELECT e.ID, e.event_name, e.event_date, e.event_time, e.event_venue, e.event_organizer, et.eventtype, e.event_image 
        FROM tblevent AS e 
        JOIN tbleventtype AS et ON e.event_type = et.ID";
$query = $dbh->prepare($sql);
$query->execute();
$eventList = $query->fetchAll(PDO::FETCH_OBJ);


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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h5>Event List</h5>
                  <a href="create-edit-event.php" class="btn btn-info btn-sm float-right">
                    <i class="fas fa-plus"></i> Add Event
                  </a>
                </div>

                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Event Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Organizer</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cnt = 1;
                      if (count($eventList) >0) {
                        foreach ($eventList as $row) { 
                            ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td>
                              <img src="/uploads/img/<?php echo htmlentities($row->event_image); ?>" alt="Event Image" style="width: 50px; height: 50px; border-radius: 50%;">
                            </td>
                            <td><?php echo htmlentities($row->event_name); ?></td>
                            <td><?php echo htmlentities($row->eventtype); ?></td>
                            <td><?php echo htmlentities(date("d-m-Y", strtotime($row->event_date))); ?></td>
                            <td><?php echo htmlentities($row->event_time); ?></td>
                            <td><?php echo htmlentities($row->event_venue); ?></td>
                            <td><?php echo htmlentities($row->event_organizer); ?></td>
                            <td>
                              <a href="create-edit-event.php?id=<?php echo $row->ID; ?>" class="btn btn-warning btn-sm">
                                <i class="mdi mdi-pencil"></i>
                              </a>
                              <a href="event-list.php?delid=<?php echo $row->ID; ?>" 
                                onclick="return confirm('Do you really want to delete?');" 
                                class="btn btn-danger btn-sm">
                                <i class="mdi mdi-delete"></i>
                              </a>
                            </td>
                          </tr>
                          <?php $cnt++; 
                        } 
                      } ?>
                    </tbody>
                  </table>
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
