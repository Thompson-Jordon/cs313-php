<?php
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$radio = $_POST['major'];

echo "Your name is " . $name . "\n";
echo 'Your email is <a href="mailto:' . $email . '">' . $email . "</a>\n";
echo "Comments:\n" . $comments . "\n";

?>