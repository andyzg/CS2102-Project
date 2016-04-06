<?php
require('database_connection.php');

if (isset($_GET['username'])) {

  //registering
  if($_GET['submitBtn'] == "Register") {
    $countquery = "SELECT * FROM carpool.carpool.users";
    $countresult = pg_query($countquery) or die('Query failed: ' . pg_last_error());
    $rowcount = pg_num_rows($countresult);

    $query = "INSERT INTO carpool.carpool.users VALUES ('".$_GET['username']."', '".$_GET['email']."', '".$_GET['firstname']."', '".$_GET['lastname']."', ".($rowcount[0] + 1).", false)";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    if (pg_num_rows($result) == 0) {
      header("Location: http://localhost:8080/CS2102-Project/app/index.php?error=1");
    }
  }

  $query = "SELECT username, is_admin FROM carpool.carpool.users u WHERE u.username = '".$_GET['username']."'";
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
