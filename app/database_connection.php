<!-- NB: port is changed from 5432 to 5433 due to my (Pontus) setup -->
<?php
$dbconn = pg_connect("host=localhost port=5433 dbname=carpool user=postgres password=poiu")
    or die('Could not connect: ' . pg_last_error());
