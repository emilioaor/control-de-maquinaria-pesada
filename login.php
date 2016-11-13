<?php
$usuario=$_POST('usuario1');
$clave=$_POST('clave1');

$conexion=mysqli_connect("localhost", "root", "", "bbddprueba");
$consulta="SELECT * FROM usuario2 WHERE usuario1= '$usuario' and clave1= '$clave'";

$resultado= mysqli_query($conexion, $consulta);

$filas= mysqli_num_rows($resultado);

if ($filas > 0) {
    header("location:index.html");
}
else{
    echo "errorr";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>