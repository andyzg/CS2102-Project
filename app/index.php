<html>
<head> <title>Main | Demo Online Carpooling Catalog</title> </head>

<body>


<form action="login.php">
  <h1> Login </h1>
  Username: <input type="text" name="username">
  <input type="submit" value="Login">
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
  echo "<p>Error: Username does not exist.</p>";
}
?>
</form>

</body>
</html>
