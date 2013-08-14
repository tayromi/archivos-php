<?php
	require "../../netwarelog/catalog/conexionbd.php";
	$idempleado = $_POST["data"];
	function datosUser($conexion,$idempleado){
		$sql = "SELECT ";
		$sql .= "	concat(";
		$sql .= "		if(NOT ISNULL(nombre),nombre,' '), ";
		$sql .= "		' ', ";
		$sql .= "		if(NOT ISNULL(apellido1),apellido1,' '), ";
		$sql .= "		' ', ";
		$sql .= "		if(NOT ISNULL(apellido2),apellido2,' ') ";
		$sql .= "	) AS Nombre ";
		$sql .= "FROM ";
		$sql .= "	empleados ";
		$sql .= "WHERE ";
		$sql .= "idempleado = ".$idempleado.";";	
		$result = $conexion->consultar($sql)or die($sql);
		$d = $conexion->siguiente($result);
		return $d["Nombre"];
			
	}
	$name = datosUser($conexion,$idempleado);
	echo $name;
?>