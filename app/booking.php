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

function remove_row($id, $table, $table_id){
	$query = "DELETE FROM $table WHERE $table_id = $id"; 
	pg_query($query) or die('Query failed: ' . pg_last_error());
	header("Location: main.php");
}

