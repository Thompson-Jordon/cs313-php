<?php
session_start();
require("connectdb.php");
$db = get_db();

//check for submit note post request
if (isset($_POST['submit_note'])) {
   try {
      $new_note = htmlspecialchars($_POST['new_note']);
      $wo_id = htmlspecialchars($_POST['wo_id']);
      $user_id = htmlspecialchars($_SESSION['user_id']);

      $qry = $db->prepare('INSERT INTO wo_note (note, date, wo_id, user_id) VALUES (:note, NOW(), :wo_id, :user_id)');
      $qry->bindValue(':note', $new_note, PDO::PARAM_STR);
      $qry->bindValue(':wo_id', $wo_id, PDO::PARAM_INT);
      $qry->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $qry->execute();
   } catch (PDOException $ex) {
      echo "Error: " . $ex;
      die();
   }

   header("location: workorder_details.php?id=" . $wo_id);
   die();
}

//check for complete post request
if (isset($_POST['complete'])) {
   try {
      $wo_id = htmlspecialchars($_POST['wo_id']);

      $qry = $db->prepare("UPDATE workorder SET end_date=now() WHERE id=:wo_id");
      $qry->bindValue(':wo_id', $wo_id, PDO::PARAM_INT);
      $qry->execute();
   } catch (PDOException $ex) {
      echo "Error: " . $ex;
      die();
   }

   header("location: workorder_details.php?id=" . $wo_id);
   die();
}