<?php
$thisPage = "Locations";
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
         <h1 class="display-3">Enter New location</h1>
      </div>
   </div>

   <form id="locationForm" action="insert_location.php" method="post">
      <div class="container">
         <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control">
         </div>
         <div class="form-group">
            <label for="area">Area:</label>
            <select type="text" id="area" name="area" class="form-control">
               <option value="NULL">Select an Area</option>
               <?php
               try {
                  $stmt = $db->prepare("SELECT id, name FROM area");
                  $stmt->execute();
                  $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($areas as $area) {
                     $id = $area['id'];
                     $name = $area['name'];
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
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
   <script src="app.js"></script>
</body>

</html>