<?
$nombre=$_POST('id');

$conexion=mysqlconect("localhost","netwa876_tay","178Alexismax") or die ("No se puede conectar con servidor");
mysql_select_bd("netwa876_tay",$conexion) or die ("No pudo conectar a la base de datos");



$tabla = "INSERT INTO Padre (Cnombre) VALUES ('$nombre')"



mysql_close ($conexion);

?>
