<html>
<head> <title>Demo Online Book Catalog</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1> Car Pooling </h1>
</td> </tr>

<?php
require('database_connection.php');
?>

<tr>
<td style="background-color:#eeeeee;">
<form>
      <h1> Carpool Offers </h1>
        Admin<input type="radio" name="is_admin"
      <?php if (isset($is_admin) && $is_admin == "1") echo "checked";?>
      value="female">
        Start: <input type="text" name="start" id="start">
        End: <input type="text" name="end" id="end">

        <?php
        $query = 'SELECT license_plate FROM cars';
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
           foreach ($line as $col_value) {
              # echo "<option value=\"".$col_value."\">".$col_value."</option><br>";
            }
        }
        pg_free_result($result);
        ?>

        <input type="submit" name="formSubmit" value="Search" >
</form>
<?php

if(isset($_GET['formSubmit']))
{
    $query = "SELECT seats, fee, start_location, end_location, offer_id FROM offers WHERE start_location like '%".$_GET['start']."%' AND end_location LIKE '%".$_GET['end']."%'";
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
    <th>Book</th>
    <th>Remove</th>
    </tr>";


    $count = 1;
    while ($row = pg_fetch_row($result)) {
      echo "<tr>";
      echo "<td>" . $row[4] . "</td>";
      echo "<td>" . $row[0] . " seats</td>";
      echo "<td>$" . $row[1] . "</td>";
      echo "<td>" . $row[2] . "</td>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td><input type='submit' value='Book'</input></td>";
      echo "<td><form action='booking.php' method='POST'><input type='hidden' name='id' value='$row[4]'><input type='submit' name='action' value='Remove'></form></td>";
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
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102
</td> </tr>
</table>

</body>
</html>
