<?php
$locationID = htmlspecialchars($_POST['locationID']);

try {
require("connectdb.php");
$db = get_db();
$stmt = $db->prepare("SELECT id, name FROM device Where location_id=:id");
$stmt->bindValue(':id', $locationID, PDO::PARAM_INT);
$stmt->execute();

$devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
   echo "your Error is: " . $ex;
   die();
}

$string = "";

foreach ($devices as $device) {
   $string .= "<option value=" . $device['id'] . ">" . $device['name'] . "</option>";
}

if ($string == "") {
   $string .= "<option value='NULL'>This location has no devices</option>";
}

echo $string;
?>