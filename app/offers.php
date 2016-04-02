<html>
<head> <title>Offers | Demo Online Carpooling Catalog</title> </head>

<body>
<table>

<?php
require('header.php');
if (!isset($_GET['username'])) {
  header("Location: http://localhost:8080/CS2102-Project/app/index.php");
}
require('database_connection.php');
?>

<tr>
<td style="background-color:#eeeeee;">
<form>
      <h1> Carpool Offers </h1>
      Start: <input type="text" name="start" id="start">
      End: <input type="text" name="end" id="end">


      <?php
        echo "<input type='hidden' name='username' value='".$_GET['username']."'>";
        echo "<input type='hidden' name='is_admin' value='".$_GET['is_admin']."'>";
      ?>
      <input type="submit" name="formSubmit" value="Search" >
</form>
<?php

if(isset($_GET['formSubmit']))
{
    $query = "SELECT seats, fee, start_location, end_location, offer_id FROM carpool.carpool.offers WHERE start_location like '%".$_GET['start']."%' AND end_location LIKE '%".$_GET['end']."%'";
    # echo "<b>SQL:   </b>".$query."<br><br>";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    echo "<table border=\"1\" >
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"25%\">
    <col width=\"25%\">
    <col width=\"5%\">
    <col width=\"5%\">
    <tr>
    <th>#</th>
    <th>Seats</th>
    <th>Fee</th>
    <th>Start location</th>
    <th>End location</th>
    <th>Book</th>";

    if ($_GET['is_admin'] == 't') {
      echo "<th>Remove</th>";
    }
    echo "</tr>";


    $count = 1;
    while ($row = pg_fetch_row($result)) {
      echo "<tr>";
      echo "<td>" . $row[4] . "</td>";
      echo "<td>" . $row[0] . " seats</td>";
      echo "<td>$" . $row[1] . "</td>";
      echo "<td>" . $row[2] . "</td>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td><form action='book.php' method='POST'><input type='hidden' name='username' value='".$_GET['username']."'><input type='hidden' name='is_admin' value='".$_GET['is_admin']."'><input type='hidden' name='id' value='$row[4]'><input type='submit' name='action' value='Book'></form></td>";
      if ($_GET['is_admin'] == 't') {
        echo "<td><form action='booking.php' method='POST'><input type='hidden' name='username' value='".$_GET['username']."'><input type='hidden' name='is_admin' value='".$_GET['is_admin']."'><input type='hidden' name='id' value='$row[4]'><input type='submit' name='action' value='Remove offer'></form></td>";
      }
      echo "</tr>";
      $count++;
    }
    echo "</table>";

    pg_free_result($result);
}
?>

</td> </tr>
<?php
pg_close($dbconn);
?>
<tr>
<td colspan="2" style="background-color:#6EB3F0; text-align:center;"> Copyright &#169; CS2102
</td> </tr>
</table>

</body>
</html>
