<?php
   //get post data
   $location = htmlspecialchars($_POST['location']);
   $device = htmlspecialchars($_POST['device']);
   $user = htmlspecialchars($_POST['user']);
   $description = htmlspecialchars($_POST['description']);
   $priority = htmlspecialchars($_POST['priority']);

   // connect to db
   require("connectdb.php");
   $db = get_db();

   try {
   // get device id
   $deviceStmt = $db->prepare('SELECT d.id as device_id FROM device d INNER JOIN location l ON d.location_id = l.id WHERE l.id=:location AND d.name=:device');
   $deviceStmt->bindValue(':location', $location, PDO::PARAM_STR);
   $deviceStmt->bindValue(':device', $device, PDO::PARAM_STR);
   $deviceStmt->execute();
   $deviceID = $deviceStmt->fetch(PDO::FETCH_ASSOC);

   // get device id
   $userStmt = $db->prepare('SELECT id FROM account WHERE display_name=:user');
   $userStmt->bindValue(':user', $user, PDO::PARAM_STR);
   $userStmt->execute();
   $userID = $userStmt->fetch(PDO::FETCH_ASSOC);

   // make prepared statment
   $wo_stmt = $db->prepare('INSERT INTO workorder (start_date, device_id, user_id, description, priority) VALUES (CURRENT_DATE, :device_id, :user_id, :description, :priority)');
   $wo_stmt->bindValue(':device_id', $deviceID['device_id'], PDO::PARAM_INT);
   $wo_stmt->bindValue(':user_id', $userID['id'], PDO::PARAM_INT);
   $wo_stmt->bindValue(':description', $description, PDO::PARAM_STR);
   $wo_stmt->bindValue(':priority', $priority, PDO::PARAM_INT);
   $wo_stmt->execute();
   
   } catch (PDOException $ex) {
      echo "Error with DB. Details: $ex";
      die();
   }

   // redirect back to Work order page
   header("Location: workorder.php");
   //kill this page
   die();
?>