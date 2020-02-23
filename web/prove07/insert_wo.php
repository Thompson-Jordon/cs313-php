<?php
   //get post data
   $locationID = htmlspecialchars($_POST['location']);
   $deviceID = htmlspecialchars($_POST['device']);
   $userID = htmlspecialchars($_POST['user']);
   $description = htmlspecialchars($_POST['description']);
   $priority = htmlspecialchars($_POST['priority']);

   // connect to db
   require("connectdb.php");
   $db = get_db();

   try {
   // make prepared statment
   $wo_stmt = $db->prepare('INSERT INTO workorder (start_date, device_id, user_id, description, priority, reoccurring) VALUES (CURRENT_DATE, :device_id, :user_id, :description, :priority, false)');
   $wo_stmt->bindValue(':device_id', $deviceID, PDO::PARAM_INT);
   $wo_stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
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