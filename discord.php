<?php
include("functions.php");

$dsnArray = array(
   'host' => DB_HOST,
   'port' => DB_PORT,
   'dbname' => DB_NAME
);

$dsn = 'mysql:' . http_build_query($dsnArray, null, ";");

$conn = new PDO($dsn, DB_USER, DB_PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO discord (ipaddr) VALUES ( :ipaddr );';

$stmt = $conn->prepare($sql);
$stmt->execute(array(
   ':ipaddr' => $_SERVER['REMOTE_ADDR']
));

header('Location: https://discord.gg/nZYmP24');
exit;
?>