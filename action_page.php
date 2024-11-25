<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php  
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $countryErr = "";
$fname = $lname = $email = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    

  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $country = test_input($_POST["country"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Formulario de contacto</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nombre: <input type="text" name="fname">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Apellidos: <input type="text" name="lname">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  Country: <input type="text" name="country">
  <span class="error"><?php echo $countryErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Country:
  <input type="radio" name="country" value="francia">Francia
  <input type="radio" name="country" value="españa">España
  <input type="radio" name="country" value="europa">Otros_EUROPA
  <span class="error">* <?php echo $countryErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Enviar">
</form>

<?php
echo "<h2>Mensaje:</h2>";
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $country;
echo "<br>";
echo $email;
?>

</body>
</html>
