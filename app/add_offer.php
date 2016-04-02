<html>
<head> <title>Main | Demo Online Carpooling Catalog</title> </head>

<body>
<table>

<?php
require('header.php');
?>

<tr>
<td style="background-color:#eeeeee;">
<form action ="booking.php" method="POST">
      <h1> Add Offer </h1>
        Start location: <input type="text" name="start" id="start">
        <p></p>
        End location: <input type="text" name="end" id="end">
        <p></p>
        Number of seats: <input type="text" name="seats" id="seats">
        <p></p>
        Fee: <input type="text" name="fee" id="fee">
        <p></p>
        <input type="submit" name="action" value="Add offer" >
</form>
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
