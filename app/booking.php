<?php
require('database_connection.php');

$action = $_POST["action"];
$user = $_POST['username'];
$isadmin = $_POST['is_admin'];
$query_param = "?username=".$user."&is_admin=".$isadmin;

if ($action == 'Remove offer') {
	$id = $_POST['id'];
	remove_row($id, 'offers', 'offer_id');
	header("Location: main.php".$query_param);
}
if ($action == 'Remove request') {
	$id = $_POST['id'];
	remove_row($id, 'requests', 'request_id');
	header("Location: main.php".$query_param);
}
if ($action == 'Add offer'){
	$seats = $_POST['seats'];
	$end = $_POST['end'];
	$start = $_POST['start'];
	$fee = $_POST['fee'];
	$owner_username = 'a'; //should be a logged in user. user "a" exists.
	add_offer($seats, $end, $start, $fee, $owner_username);
	header("Location: offers.php?start=".$start."&end=".$end."&username=".$user."&is_admin=".$isadmin."&formSubmit=Search");
}

function remove_row($id, $table, $table_id){
	$query = "DELETE FROM carpool.carpool.$table WHERE $table_id = $id";
	pg_query($query) or die('Query failed: ' . pg_last_error());
}

function add_offer($seats, $end, $start, $fee, $owner_username){
	$query = "SELECT COUNT(*) FROM carpool.carpool.offers";
	$count_result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$row = pg_fetch_row($count_result);
	$offer_id = 100+(int)$row[0]; // very unsafe
	++$offer_id;
	$add_query = "INSERT INTO carpool.carpool.offers (offer_id, owner_username, start_location, end_location, seats, fee) VALUES ($offer_id, '$owner_username', '$start', '$end', $seats, $fee)";
	pg_query($add_query) or die('Query failed: ' . pg_last_error());
}
