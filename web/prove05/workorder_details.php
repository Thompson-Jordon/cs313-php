<?php
$thisPage = "Work Order";

// get work order id
$wo_id = htmlspecialchars($_GET["id"]);

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get work order data
$stmt = $db->prepare('SELECT w.id As id, l.name AS location, d.name AS device, w.start_date AS date, w.priority AS priority, a.display_name as user, w.description AS description FROM ( ( ( workorder w INNER JOIN device d ON w.device_id = d.id ) INNER JOIN location l ON d.location_id = l.id) INNER JOIN account a ON w.user_id = a.id ) WHERE w.id=:id');
$stmt->bindValue(':id', $wo_id, PDO::PARAM_INT);
$stmt->execute();
$workorder = $stmt->fetch(PDO::FETCH_ASSOC);

// Set Variables
$location = $workorder['location'];
$device = $workorder['device'];
$date = $workorder['date'];
$priority = $workorder['priority'];
$user = $workorder['user'];
$description = $workorder['description'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Work Order Details</title>
</head>

<body>
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-3">Work Order #<?php echo $wo_id; ?><echo>
         </h1>
         <h3><?php echo $location ?> <?php echo $device; ?></h3>
         <h5>Assigned to: <?php echo $user; ?></h5>
         <hr class="my-2">
         <h4>Description:</h4>
         <p><?php echo $description; ?></p>
         <hr class="my-2">
         <h4>User Notes: </h4>
         <p><?php echo $notes; ?></p>
      </div>
   </div>

   </table>
</body>

</html>