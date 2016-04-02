<?php
require('database_connection.php');

$action = $_POST["action"];

if ($action == 'Remove offer') {
	$id = $_POST['id'];
	remove_row($id, 'offers', 'offer_id');
}
if ($action == 'Remove request') {
	$id = $_POST['id'];
	remove_row($id, 'requests', 'request_id');
}
if ($action == 'Add offer'){
	$seats = $_POST['seats'];
	$end = $_POST['end'];
	$start = $_POST['start'];
	$fee = $_POST['fee'];
	$owner_username = 'a'; //should be a logged in user. user "a" exists.
	add_offer($seats, $end, $start, $fee, $owner_username);
}

function remove_row($id, $table, $table_id){
	$query = "DELETE FROM $table WHERE $table_id = $id"; 
	pg_query($query) or die('Query failed: ' . pg_last_error());
	header("Location: main.php");
}

function add_offer($seats, $end, $start, $fee, $owner_username){
	$query = "SELECT COUNT(*) FROM offers";
	$count_result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$row = pg_fetch_row($count_result);
	$offer_id = 100+(int)$row[0]; // very unsafe
	++$offer_id;
	$add_query = "INSERT INTO offers (offer_id, owner_username, start_location, end_location, seats, fee) VALUES ($offer_id, '$owner_username', '$start', '$end', $seats, $fee)";
	pg_query($add_query) or die('Query failed: ' . pg_last_error());
	header("Location: main.php");
}