<?php
$thisPage = "Locations";

require("connectdb.php");
$db = get_db();

$location_id = htmlspecialchars($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Device Details</title>
</head>

<body>
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-3">Enter New Device</h1>
      </div>
   </div>

   <form id="workorderForm" action="insert_device.php" method="post">
      <div class="container">
         <div class="form-group">
            <label for="type">Device Type:</label>
            <select type="text" id="type" name="type" class="form-control">
               <option value="NULL">Select a device type</option>
               <?php
               try {
                  $stmt = $db->prepare("SELECT id, name FROM device_type");
                  $stmt->execute();
                  $types = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($types as $type) {
                     $id = $type['id'];
                     $name = $type['name'];
               ?>
                     <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
               <?php
                  }
               } catch (PDOException $ex) {
                  echo "Exception Error: $ex";
                  die();
               }
               ?>
            </select>
         </div>
         <div class="form-group">
            <label for="name">Device Name:</label>
            <input type="text" id="device" name="device" class="form-control">
         </div>
         <div class="form-group">
            <label for="device_id">Device ID: (Optional)</label>
            <input type="text" id="device_id" name="device_id" class="form-control">
         </div>
         <div class="form-group">
            <label for="is_sched">Sheduled?</label>
            <select type="text" id="is_sched" name="is_sched" class="form-control">
               <option value="False">No</option>
               <option value="True">Yes</option>
            </select>
         </div>
         <div class="form-group">
            <label for="frequency">Frequency: (in days)</label>
            <input type="text" id="frequency" name="frequency" class="form-control" value="0">
         </div>
         <input type="hidden" name="location" value="<?php echo $location_id; ?>">
         <button type="submit" class="btn btn-info">Submit</button>
      </div>
   </form>
   <script src="app.js"></script>
</body>

</html>