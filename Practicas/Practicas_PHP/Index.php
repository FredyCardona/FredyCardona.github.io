<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Practicas</title>
</head>
<body>
<div id = "Formulario"></div>
<label>Ingresa tus datos</label>
<form action="registro.php" method="POST">
    <input type="text" id = "Nombre" name = "Nombre">
    <input type="text" id = "Apellido" name = "Apellido">
    <input type="number" id = "Carne" name = "Carne">
    <input type="text" id = "Correo" name = "Correo">
    <input type="text" id = "lugar_origen" name = "lugar_origen">
    <input type="submit" value = "enviar">
</form>
<br>
<table>
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Carne</th>
    <th>Correo</th>
    <th>lugar_origen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $servername = "localhost";
    $database = "Prueba";
    $username = "root";
    $password = "";
    // Create connection
    $conexion = mysqli_connect($servername, $username, $password, $database);
        $select = $conexion->query("SELECT * from usuarios");

        foreach ($select as $registro){
            echo "<tr>
                <td>".$registro['Nombre']."</td>
                <td>".$registro['Apellido']."</td>
                <td>".$registro['Carne']."</td>
                <td>".$registro['Correo']."</td>
                <td>".$registro['Lugar_Origen']."</td>
                </tr>";
        }
    ?>
    </tbody>
</table>
<br>
<form action="" method="POST">
    <input type="number" id = "num1" name = "num1">
    <input type="number" id = "num2" name = "num2">
    <input type="number" id = "num3" name = "num3">
    <input type="number" id = "num4" name = "num4">
    <input type="submit" value = "enviar">
</form>
<?php
if(isset($_POST['num1']))
{
    $num1 = $_POST['num1'];  
}
else{
    $num1 = 0;
}
if(isset($_POST['num2']))
{
    $num2 = $_POST['num2']; 
}
else{
    $num2 = 0;
}
if(isset($_POST['num3']))
{
    $num3 = $_POST['num3'];
}
else{
    $num3 = 0;
}
if(isset($_POST['num4']))
{
    $num4 = $_POST['num4'];
}
else{
    $num4 = 0;
}



$suma = $num1 + $num2 + $num3 + $num4;
echo "<a>El valor de su suma es</a> " .$suma;

$servername = "localhost";
$database = "Prueba";
$username = "root";
$password = "";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
    $select = $conexion->query("SELECT * from operacion");
    
    echo "<br>";

    echo "
    <table>
    <thead>
    <tr>
    <th>Num 1</th>
    <th>nume 2</th>
    <th>num 3</th>
    <th>nUM 4</th>
    <th>resultado</th>
    </tr>
    </thead>
    <tbody>
";

    foreach ($select as $registro){
        echo "<tr>
            <td>".$registro['numero1']."</td>
            <td>".$registro['numero2']."</td>
            <td>".$registro['numero3']."</td>
            <td>".$registro['numero4']."</td>
            <td>".$registro['resultado']."</td>
            </tr>";
    }

    
if(isset($_POST['num1']) and isset($_POST['num2']) and isset($_POST['num3']) and isset($_POST['num4'])){
    $sql = "INSERT INTO operacion (numero1, numero2, numero3, numero4, resultado) 
    VALUES ('".$_POST['num1']."', '".$_POST['num2']."', '".$_POST['num3']."', '".$_POST['num4']."','".$suma."')";
    if (mysqli_query($conexion, $sql)) {
          echo "New record created successfully";
    
          echo "<a href = 'http://localhost/Practicas/Practicas_PHP/index.php'>Regresar</a>";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    mysqli_close($conexion);
    
    
}
?>
</body>
</html>