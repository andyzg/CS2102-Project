<html>
<head> <title>Main | Demo Online Carpooling Catalog</title> </head>

<body>


<form action="login.php">
  <h1> Login </h1>
  Username: <input type="text" name="username"><br>
  First name: <input type="text" name="firstname"><br>
  Last name: <input type="text" name="lastname"><br>
  Email: <input type="text" name="email"><br>
  <input type="submit" name="submitBtn" value="Login">
  <input type="submit" name="submitBtn" value="Register">
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
  echo "<p>Error: Username does not exist.</p>";
}
?>
</form>

</body>
</html>
