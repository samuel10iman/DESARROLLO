<?php

$conexion = new mysqli('localhost', 'root', '', 'formulario');

if ($conexion->connect_errno) {
    die('Error en la conexión: ' . $conexion->connect_error);
}

// Verificamos si se han enviado los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['fecha_nacimiento']) && isset($_POST['ocupacion']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['nacionalidad']) && isset($_POST['nivel_ingles']) && isset($_POST['lenguajes']) && isset($_POST['aptitudes']) && isset($_POST['habilidades']) && isset($_POST['perfil']) && isset($_POST['formacion']) && isset($_POST['experiencia'])) {
    
    // Asignamos los valores a las variables
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$ocupacion = $_POST["ocupacion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$nacionalidad = $_POST["nacionalidad"];
$nivel_ingles = $_POST["nivel_ingles"];
$lenguajes = implode(", ", $_POST["lenguajes"]);
$aptitudes = $_POST["aptitudes"];
$habilidades = implode(", ", $_POST["habilidades"]);
$perfil = $_POST["perfil"];
$formacion = $_POST["formacion"];
$experiencia = $_POST["experiencia"];

$sql = "INSERT INTO registros (nombre, apellidos, fecha_nacimiento, ocupacion, telefono, correo, nacionalidad, nivel_ingles, lenguajes, aptitudes, habilidades, perfil, formacion, experiencia) 
        VALUES ('$nombre', '$apellidos', '$fecha_nacimiento', '$ocupacion', '$telefono', '$correo', '$nacionalidad', '$nivel_ingles', '$lenguajes', '$aptitudes', '$habilidades', '$perfil', '$formacion', '$experiencia')";

if (!$conexion->query($sql)) {
  die('Error al insertar los datos: ' . $conexion->error);
}

echo "Los datos se guardaron correctamente";
} else {
echo "No se enviaron los datos del formulario";
}

$conexion->close();

?>
