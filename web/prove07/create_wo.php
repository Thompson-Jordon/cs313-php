<?php
$thisPage = "Work Order";

require("connectdb.php");
$db = get_db();
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
         <h1 class="display-3">Enter New Work Order</h1>
      </div>
   </div>

   <form id="workorderForm" action="insert_wo.php" method="post">
      <div class="container">
         <div class="form-group">
            <label for="location">Location:</label>
            <select type="text" id="location" name="location" class="form-control" required>
               <option value="" disabled selected>Select a location</option>
               <?php
               try {
                  $stmt = $db->prepare("SELECT id, name FROM location");
                  $stmt->execute();
                  $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($locations as $location) {
                     $id = $location['id'];
                     $name = $location['name'];
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
            <label for="device">Device:</label>
            <select type="text" id="device" name="device" class="form-control" required>
               <option value="" disabled selected>Select a location first</option>
            </select>
         </div>
         <div class="form-group">
            <label for="user">Assign to:</label>
            <select type="text" id="user" name="user" class="form-control">
               <option value="NULL">Select a User</option>
               <?php
               try {
                  $userstmt = $db->prepare("SELECT id, first_name, last_name FROM account");
                  $userstmt->execute();
                  $users = $userstmt->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($users as $user) {
                     $id = $user['id'];
                     $fname = $user['first_name'];
                     $lname = $user['last_name'];
               ?>
                     <option value="<?php echo $id; ?>"><?php echo $fname. " " . $lname; ?></option>
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
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" class="form-control">
         </div>
         <div class="form-group">
            <label for="priority">Priority:</label>
            <select type="text" id="priority" name="priority" class="form-control">
               <option value="1">1 - High</option>
               <option value="2">2 - Medium</option>
               <option value="3">3 - Low</option>
            </select>
         </div>
         <button type="submit" id="submit_wo" class="btn btn-info">Submit</button>
      </div>
   </form>
   <script type="text/javascript" src="app.js"></script>
</body>

</html>