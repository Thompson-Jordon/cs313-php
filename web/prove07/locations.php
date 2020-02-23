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

<body class="bg-secondary">
   <?php require("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid bg-secondary">
      <div class="container form-inline border-secondary rounded bg-light py-3">
            <a class="btn btn-info btn-lg form-control mb-3" href="create_location.php" role="button">Add Location</a>
            <input class="form-control mb-2 ml-auto" id="myInput" type="text" placeholder="Search..">
         <div class="container">
            <table id="myTable" class="table table-striped table-hover table-sm">
               <thead>
                  <tr>
                     <th onclick="sortTable(0)">Location</th>
                     <th onclick="sortTable(1)">Area</th>
                  </tr>
               </thead>
               <tbody id="tableBody">
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
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <script src="app.js"></script>
</body>

</html>