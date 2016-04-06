<html>
<head> <title>Main | Demo Online Carpooling Catalog</title> </head>

<body>


<form action="login.php">

  <h1> Login </h1>

  <p>Username: <input type="text" name="username"> </p>
  <input type="submit" name="submitBtn" value="Login"><br>
  
  <p>First name: <input type="text" name="firstname"> </p>
  <p>Last name: <input type="text" name="lastname"> </p>
  <p>Email: <input type="text" name="email"> </p>
  <input type="submit" name="submitBtn" value="Register">
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
  echo "<p>Error: Username does not exist.</p>";
}
?>
</form>

</body>
</html>
