<tr> <td colspan="2" style="background-color:#6EB3F0;">
<h1> Car Pooling </h1>
<?php
echo "<a href='main.php?username=".$_GET['username']."&is_admin=".$_GET['is_admin']."'>Main</a>";
echo "<br>";
echo "<a href='add_offer.php?username=".$_GET['username']."&is_admin=".$_GET['is_admin']."'>Add offer</a>";
echo "<br>";
echo "<a href='offers.php?username=".$_GET['username']."&is_admin=".$_GET['is_admin']."'>Offers</a>";
echo "<br>";
echo "<a href='requests.php?username=".$_GET['username']."&is_admin=".$_GET['is_admin']."'>Requests</a>";
?>
</td> </tr>
