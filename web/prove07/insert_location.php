<?php
   //get post data
   $location = htmlspecialchars($_POST['location']);
   $area = htmlspecialchars($_POST['area']);

   // connect to db
   require("connectdb.php");
   $db = get_db();

   try {

   // make prepared statment
   $stmt = $db->prepare('INSERT INTO location (name, area_id) VALUES (:name, :area_id)');
   $stmt->bindValue(':name', $location, PDO::PARAM_STR);
   $stmt->bindValue(':area_id', $area, PDO::PARAM_INT);
   $stmt->execute();
   
   } catch (PDOException $ex) {
      echo "Error with DB. Details: $ex";
      die();
   }

   // redirect back to Work order page
   header("Location: locations.php");
   //kill this page
   die();
?>