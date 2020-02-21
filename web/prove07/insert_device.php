<?php
   //get post data
   $location = htmlspecialchars($_POST['location']);
   $name = htmlspecialchars($_POST['device']);
   $device_id = htmlspecialchars($_POST['device_id']);
   $type = htmlspecialchars($_POST['type']);
   $is_sched = htmlspecialchars($_POST['is_sched']);
   $frequency = htmlspecialchars($_POST['frequency']);
   
   // connect to db
   require("connectdb.php");
   $db = get_db();

   // create device id if it was null
   if($device_id == "") {
      $temp = $db->query("SELECT id FROM device ORDER BY id DESC LIMIT 1");
      $result = $temp->fetch(PDO::FETCH_ASSOC);
      $next = $result['id'] + 1;
      $count = 10 - strlen($next);
      while($count > 0) {
         $count--;
         $device_id .= 0;
      }
      $device_id .= $next;
   }

   try {
   // make prepared statment
   $stmt = $db->prepare('INSERT INTO device (name, device_id, is_sched, frequency, type_id, location_id) VALUES (:name, :device_id, :is_sched, :frequency, :type, :location)');
   $stmt->bindValue(':name', $name, PDO::PARAM_STR);
   $stmt->bindValue(':device_id', $device_id, PDO::PARAM_STR);
   $stmt->bindValue(':is_sched', $is_sched, PDO::PARAM_BOOL);
   $stmt->bindValue(':frequency', $frequency, PDO::PARAM_INT);
   $stmt->bindValue(':type', $type, PDO::PARAM_STR);
   $stmt->bindValue(':location', $location, PDO::PARAM_INT);
   $stmt->execute();
   
   } catch (PDOException $ex) {
      echo "Error with DB. Details: $ex";
      die();
   }

   // redirect back to Work order page
   header("Location: location_details.php?id=" . $location);
   //kill this page
   die();
?>