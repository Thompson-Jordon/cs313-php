<?php
$locationID = htmlspecialchars($_POST['dropdownValue']);



function processDropdown($selectedVal) {
   //if (is)
   require("connectdb.php");
   $db = get_db();
   $stmt = $db->prepare("SELECT id, name FROM device Where location_id=:id");
   $stmt->bindValue(':id', $locationID, PDO::PARAM_INT);
   $stmt->execute();

   $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $response['json'] =  json_encode($devices);
   echo $response;
}

if ($data) {
   processDropdown($data);
}

function is_ajax() {
   return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
 }