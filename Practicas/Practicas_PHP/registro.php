<?php
$servername = "localhost";
$database = "Prueba";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";

 
$sql = "INSERT INTO usuarios (Nombre, Apellido, Carne, Correo, Lugar_Origen) VALUES ('".$_POST['Nombre']."', '".$_POST['Apellido']."', '".$_POST['Carne']."', '".$_POST['Correo']."', '".$_POST['lugar_origen']."')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";

      echo "<a href = 'http://localhost/Practicas/Practicas_PHP/index.php'>Regresar</a>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>