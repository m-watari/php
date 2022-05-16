<?php
require_once('Connections/connect.php');

$database = new PDO( "mysql:host=" . $hostname_xxx . ";dbname=" . $database_xxx . ";charset=UTF8;", $username_xxx, $password_xxx );
$query = "SELECT * FROM table_name WHERE id = :id";
$stmt = $database->prepare( $query );
$stmt->bindValue( ':id', $id, PDO::PARAM_INT );
$stmt->execute();
$row_Record = $stmt->fetch(PDO::FETCH_ASSOC);
$total_row_Records = $Records->rowCount();

do {
 echo $row_Record['col1'];
} while ($row_Record = $stmt->fetch(PDO::FETCH_ASSOC));