<html>
<head> <title>Requests | Demo Online Carpooling Catalog</title> </head>

<body>
<table>

<?php
require('header.php');
require('database_connection.php');
?>

<tr>
<td style="background-color:#eeeeee;">

<?php

    //can only see your own offers
    $query = "SELECT r.request_id, r.seats_requested, o.seats, r.offer_id, r.username FROM carpool.carpool.requests r, carpool.carpool.offers o WHERE o.offer_id = r.offer_id AND o.owner_username = '".$_GET['username']."'";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    echo "<table border=\"1\" >
    <col width=\"10%\">
    <col width=\"20%\">

    <col width=\"20%\">
    <col width=\"30%\">

    <col width=\"10%\">
    <col width=\"10%\">
    <tr>
    <th>#</th>
    <th>Seats Requested</th>
    <th>Seats Left</th>
    <th>Requester</th>
    <th>Accept</th>
    <th>Remove</th>
    </tr>";


    $count = 1;
    while ($row = pg_fetch_row($result)) {
      echo "<tr>";
      echo "<td>" . $row[0] . "</td>";
      echo "<td>" . $row[1] . " seats</td>";
      echo "<td>" . $row[2] . " seats</td>";
      echo "<td>" . $row[4] . "</td>";
      echo "<td><form action='booking.php' method='POST'><input type='submit' name='action' value='Accept request'><input type='hidden' name='id' value='$row[0]'><input type='hidden' name='seats' value='$row[1]'><input type='hidden' name='offer_id' value='$row[3]'><input type='hidden' name='username' value='".$_GET['username']."'><input type='hidden' name='".$_GET['is_admin']."' value='$row[3]'></form></td>";
      echo "<td><form action='booking.php' method='POST'><input type='submit' name='action' value='Remove request'><input type='hidden' name='id' value='$row[0]'></form></td>";
      echo "</tr>";
      $count++;
    }
    echo "</table>";

    pg_free_result($result);

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
