<?php
require('database_connection.php');

if (isset($_GET['username'])) {
  $query = "SELECT username, is_admin FROM users u WHERE u.username = '".$_GET['username']."'";
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());
  header("Location: http://localhost:8080/CS2102-Project/app/index.php");
  if (pg_num_rows($result) == 0) {
    header("Location: http://localhost:8080/CS2102-Project/app/index.php?error=1");
  } else {
    $row = pg_fetch_row($result);
    header("Location: http://localhost:8080/CS2102-Project/app/main.php?username=".$row[0]."&is_admin=".$row[1]);
  }
} else {
  header("Location: http://localhost:8080/CS2102-Project/app/index.php");
}

?>
