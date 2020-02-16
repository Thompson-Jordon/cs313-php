<?php
$thisPage = "Work Order";

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get work order data
$workorders = $db->prepare("SELECT w.id As id, l.name AS location, d.name AS device, w.start_date AS date, w.priority AS priority, a.display_name as user, w.description AS description FROM ( ( ( workorder w INNER JOIN device d ON w.device_id = d.id ) INNER JOIN location l ON d.location_id = l.id) INNER JOIN account a ON w.user_id = a.id )");
$workorders->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Work Order System</title>
</head>

<body>
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-3">Work Orders</h1>
         <hr class="my-2">
         <p class="lead">
            <a class="btn btn-primary btn-lg" href="create_wo.php" role="button">Create Workorder</a>
         </p>
      </div>
   </div>
   <table class="table table-striped table-hover">
      <tr>
         <th>ID</th>
         <th>Location</th>
         <th>Device</th>
         <th>Creation Date</th>
         <th>Priority</th>
         <th>Assigned To</th>
         <th>Description</th>
      </tr>
      <?php
      foreach ($workorders as $wo) {
         $id = $wo['id'];
         $location = $wo['location'];
         $device = $wo['device'];
         $date = $wo['date'];
         $priority = $wo['priority'];
         $user = $wo['user'];
         $description = $wo['description'];
      ?>
         <tr class="clickable-row" data-href="workorder_details.php?id=<?php echo $id; ?>">
            <td><?php echo $id; ?></td>
            <td><?php echo $location; ?></td>
            <td><?php echo $device; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $priority; ?></td>
            <td><?php echo $user; ?></td>
            <td><?php echo $description; ?></td>
         </tr>
      <?php
      }
      ?>
   </table>
   <script src="app.js"></script>
</body>

</html>