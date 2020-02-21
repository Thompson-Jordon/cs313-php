<?php
$thisPage = "Locations";

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get locations data
$locations = $db->prepare("SELECT l.id AS id, l.name AS location, a.name AS area FROM location l INNER JOIN area a ON l.area_id = a.id ORDER BY l.name ASC");
$locations->execute();
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
         <h1 class="display-3">Locations</h1>
         <hr class="my-2">
         <p class="lead">
            <a class="btn btn-info btn-lg" href="create_location.php" role="button">Add Location</a>
         </p>
      </div>
   </div>
   <table id="myTable" class="table table-striped table-hover table-sm">
      <tr>
         <th onclick="sortTable(0)">Location</th>
         <th onclick="sortTable(1)">Area</th>
      </tr>
      <?php
      foreach ($locations as $row) {
         $id = $row['id'];
         $location = $row['location'];
         $area = $row['area'];
      ?>
         <tr class="clickable-row" data-href="location_details.php?id=<?php echo $id; ?>">
            <td><?php echo $location; ?></td>
            <td><?php echo $area; ?></td>
         </tr>
      <?php
      }
      ?>
   </table>
   <script src="app.js"></script>
</body>

</html>