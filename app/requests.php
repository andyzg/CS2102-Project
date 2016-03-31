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



    $query = "SELECT request_id, seats_requested FROM requests";
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
    <th>Book</th>
    <th>Remove</th>
    </tr>";


    $count = 1;
    while ($row = pg_fetch_row($result)) {
      echo "<tr>";
      echo "<td>" . $row[0] . "</td>";
      echo "<td>" . $row[1] . " seats</td>";
      echo "<td><input type='submit' value='Book'</input></td>";
      echo "<td><form action='booking.php' method='POST'><input type='hidden' name='id' value='$row[0]'><input type='submit' name='action' value='Remove request'></form></td>";
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
