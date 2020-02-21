<?php
$thisPage = "Work Order";

// get work order id
$wo_id = htmlspecialchars($_GET["id"]);

// Connect to Database
require("connectdb.php");
$db = get_db();
// Get work order data
$stmt = $db->prepare("SELECT w.id As id, l.name AS location, d.name AS device, to_char(w.start_date, 'mm/dd/yyyy HH12:MI AM') AS start_date, to_char(w.end_date, 'mm/dd/yyyy HH12:MI AM') AS end_date, w.priority AS priority, a.first_name as first_name, a.last_name as last_name, w.description AS description FROM ( ( ( workorder w INNER JOIN device d ON w.device_id = d.id ) INNER JOIN location l ON d.location_id = l.id) INNER JOIN account a ON w.user_id = a.id ) WHERE w.id=:id");
$stmt->bindValue(':id', $wo_id, PDO::PARAM_INT);
$stmt->execute();
$workorder = $stmt->fetch(PDO::FETCH_ASSOC);

// Set Variables
$location = $workorder['location'];
$device = $workorder['device'];
$start_date = $workorder['start_date'];
$end_date = $workorder['end_date'];
$priority = $workorder['priority'];
$first_name = $workorder['first_name'];
$last_name = $workorder['last_name'];
$description = $workorder['description'];
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
      <div class="container border-secondary rounded bg-light pb-2">
         <h1 class="display-3">Work Order #<?php echo $wo_id; ?><echo>
         </h1>
         <h3><?php echo $location ?> <?php echo $device; ?></h3>
         <h5>Assigned to: <?php echo $first_name . " " . $last_name; ?></h5>
         <small class="text-info">Date Created: <?php echo $start_date; ?></small>
         <?php
         if ($end_date != "") { ?>
            </br><small class="text-info">Date Completed: <?php echo $end_date; ?></small>
         <?php
         }
         ?>
         <hr class="my-2">
         <h4>Description:</h4>
         <p><?php echo $description; ?></p>
         <hr class="my-2">
         <h4>User Notes: </h4>
         <?php
         try {
            $noteqry = $db->prepare("SELECT n.note AS note, to_char(n.date, 'mm/dd/yyyy HH12:MI AM') AS date, a.first_name AS first_name, a.last_name AS last_name FROM (wo_note n INNER JOIN account a ON n.user_id = a.id) WHERE n.wo_id=:wo_id ORDER BY n.date ASC");
            $noteqry->bindValue(':wo_id', $wo_id, PDO::PARAM_INT);
            $noteqry->execute();
            $rows = $noteqry->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException $ex) {
            echo "Error: " . $ex;
            die();
         }

         foreach ($rows as $row) {
            $note = $row['note'];
            $note_date = $row['date'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
         ?>
            <small class="text-info"><?php echo $fname . " " . $lname . " - " . $note_date; ?></small>
            <p><?php echo $note; ?></p>
         <?php
         }
         ?>
         <?php
         if ($end_date == "") { ?>
         <form action="handle_wo.php" method="post">
            <textarea type="text" name="new_note" cols="40" rows="5"></textarea></br>
            <input type="hidden" name="wo_id" value="<?php echo $wo_id; ?>">
            <input type="submit" class="btn btn-info" name="submit_note" value="Add Note">
         </form>
         <form action="handle_wo.php" method="post">
            <input type="hidden" name="wo_id" value="<?php echo $wo_id; ?>">
            <input type="submit" class="btn btn-danger mt-1" name="complete" value="Complete Work Order">
         </form>
         <?php } ?>
      </div>
   </div>

   </table>
</body>

</html>