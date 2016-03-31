<?php
require('database_connection.php');

$action = $_POST["action"];


if ($action == 'Remove') {
	$id = $_POST['id'];
	remove_row($id);
}



function remove_row($id){
	$query = "DELETE FROM offers WHERE offer_id = '$id'"; 
	pg_query($query) or die('Query failed: ' . pg_last_error());
	header("Location: main.php");
}
