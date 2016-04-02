<?php
require('database_connection.php');

$action = $_POST["action"];
$query_param = "?username=".$_POST['username']."&is_admin=".$_POST['is_admin'];

$query = "INSERT INTO carpool.carpool.requests (request_id, username, seats_requested, offer_id) VALUES ";
$request_id = $id*1000 + rand(0, 1000);
$values = "(".$request_id.", '".$_POST['username']."',1,".$_POST['id'].")";
pg_query($query.$values) or die('Query failed: ' . pg_last_error());
header("Location: main.php".$query_param);
