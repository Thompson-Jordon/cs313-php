<?php
include('connectDB.php');

$db = get_db();

$query = 'SELECT id, userid, content FROM note';
$stmt = $db->prepare($query);
$stmt->execute();
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
   <title>Practice connect DB</title>
</head>

<body>
   <h1>Notes</h1>
   <ul>
      <?php
      foreach ($notes as $note) {
         $id = $note['id'];
         $user = $note['userid'];
         $content = $note['content'];
         echo "<li>
         <p>" . $id . " " . $user . " " . $content . "</p></li>";
      } ?>
   </ul>

   <?php
   foreach ($db->query('SELECT username, password FROM note_user') as $row) {
      echo 'user: ' . $row['username'];
      echo ' password: ' . $row['password'];
      echo '</br>';
   } ?>
</body>

</html>