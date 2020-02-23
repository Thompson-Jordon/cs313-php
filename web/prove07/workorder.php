<?php
$thisPage = "Work Order";

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get work order data
$workorders = $db->prepare("SELECT w.id As id, l.name AS location, d.name AS device, to_char(w.start_date, 'mm/dd/yyyy') AS start_date, to_char(w.end_date, 'mm/dd/yyyy') AS end_date, w.priority AS priority, a.first_name as first_name, a.last_name as last_name, w.description AS description FROM ( ( ( workorder w INNER JOIN device d ON w.device_id = d.id ) INNER JOIN location l ON d.location_id = l.id) INNER JOIN account a ON w.user_id = a.id )");
$workorders->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Work Order System</title>
</head>

<body class="bg-secondary">
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid bg-secondary">
      <div class="container-fluid form-group border-info rounded bg-light py-3">
         <div class="form-inline">
               <a class="btn btn-info mb-3 btn-lg form-control" href="create_wo.php" role="button">Create Workorder</a>
               <input class="form-control mb-2 ml-auto" id="myInput" type="text" placeholder="Search..">
         </div>
         <div class="bg-light">
            <table id="myTable" class="table table-striped table-hover table-sm">
               <thead>
                  <tr>
                     <th onclick="sortTable(0)">ID</th>
                     <th onclick="sortTable(1)">Location</th>
                     <th onclick="sortTable(2)">Device</th>
                     <th onclick="sortTable(3)">Created</th>
                     <th onclick="sortTable(4)">Completed</th>
                     <th onclick="sortTable(5)">Priority</th>
                     <th onclick="sortTable(6)">Assigned To</th>
                     <th onclick="sortTable(7)">Description</th>
                  </tr>
               </thead>
               <tbody id="tableBody">
                  <?php
                  foreach ($workorders as $wo) {
                     $id = $wo['id'];
                     $location = $wo['location'];
                     $device = $wo['device'];
                     $start_date = $wo['start_date'];
                     $end_date = $wo['end_date'];
                     $priority = $wo['priority'];
                     $first_name = $wo['first_name'];
                     $last_name = $wo['last_name'];
                     $description = $wo['description'];
                  ?>
                     <tr class="clickable-row" data-href="workorder_details.php?id=<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $location; ?></td>
                        <td><?php echo $device; ?></td>
                        <td><?php echo $start_date; ?></td>
                        <td><?php echo $end_date; ?></td>
                        <td><?php echo $priority; ?></td>
                        <td><?php echo $first_name . " " . $last_name; ?></td>
                        <td><?php echo $description; ?></td>
                     </tr>
                  <?php
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <script src="app.js"></script>
</body>

</html>