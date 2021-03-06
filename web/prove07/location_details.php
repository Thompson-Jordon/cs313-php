<?php
$thisPage = "Locations";

// get work order id
$location_id = htmlspecialchars($_GET["id"]);

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get location data
$stmt = $db->prepare('SELECT l.name AS location, a.name AS area FROM location l INNER JOIN area a ON l.area_id = a.id WHERE l.id=:id');
$stmt->bindValue(':id', $location_id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Set location Variables
$location = $data['location'];
$area = $data['area'];

// Get location devices
$stmt2 = $db->prepare('SELECT d.name AS device_name, d.device_id as device_id, t.name AS type  FROM ((device d INNER JOIN location l ON d.location_id = l.id) INNER JOIN device_type t ON d.type_id = t.id) WHERE d.location_id=:id');
$stmt2->bindValue(':id', $location_id, PDO::PARAM_INT);
$stmt2->execute();
$devices = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Work Order Details</title>
</head>

<body class="bg-secondary">
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid bg-secondary">
      <div class="container border-secondary rounded bg-light">
         <h1 class="display-3"><?php echo $location; ?><echo>
         </h1>
         <h4><?php echo $area; ?></h4>
         <hr class="my-2">
         <p class="lead">
            <a class="btn btn-info btn-lg" href="create_device.php?id=<?php echo $location_id; ?>" role="button">Add Device</a>
         </p>
         <div class="container pb-2">
            <h5>Devices:</h5>
            <table id="myTable" class="table table-striped table-sm">
               <tr>
                  <th onclick="sortTable(0)">Name</th>
                  <th onclick="sortTable(1)">Device ID</th>
                  <th onclick="sortTable(2)">Device Type</th>
               </tr>
               <?php
               foreach ($devices as $next) {
                  $device_name = $next['device_name'];
                  $device_id = $next['device_id'];
                  $type = $next['type'];
               ?>
                  <tr>
                     <td><?php echo $device_name; ?></td>
                     <td><?php echo $device_id; ?></td>
                     <td><?php echo $type; ?></td>
                  </tr>
               <?php
               }
               ?>
            </table>
         </div>
      </div>
   </div>
</body>

</html>