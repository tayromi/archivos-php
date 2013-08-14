<?php

	session_start();
	$idempleado=$_SESSION["accelog_idempleado"];
	//$session_1=20;
	$sdate= date("d/m/Y");
	
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
//i641
//i643

?>


<script>



$(document).ready(function(){
	
	// INICIA OCULTAMIENTO DE CAMPOS
	$("#i640").hide();
	$("#i643").val("<?php echo $sdate ?>");
	$("#i643").hide();
	$("#lbl393").hide();
	// TERMINA OCULTAMIENTO DE CAMPOS

	// INICIA VALIDACION DE MODIFICACION O REGISTRO
	if($("#i637").val() == '(Autonúmerico)')
	{
		
			var name  = $("#i641").attr("name");
			var valor = $("#i641>option:selected").val();
			$("#i641").hide().removeAttr('name').after('<input type="hidden" name="'+name+'" value="'+valor+'">');
		}else
	{
		$("#i638,#i639").attr("readonly", true);
		if($("#i641").val() == -1)
		{
			$("#i641").attr("readonly", true);
		}else
		{
			$("#i641").attr("readonly", false);
		}
		
	}
	// TERMINA VALIDACION DE MODIFICACION O REGISTRO
	
	// INICIA ASIGNACION DE VALOR DE USUARIO

	var val = $("#i640").val();
	if(val == 0)
	{
		$("#i640").val("<?php echo $idempleado ?>").after("<label>"+"<?php echo $name; ?>"+"</label>");
	}
	else
	{
		//buscar por ajax
		$.post("../../modulos/pagos/getUser.php",{data:$("#i640").val()},function(data){
			$("#i640").after("<label>"+data+"</label>");
		});
	}
	// TERMINA ASIGNACION DE VALOR DE USUARIO

	//alert(val);
	
		
//	$("#i641").change(function(){
	
	//	if($("#i641").val() == -1)
	//	{
		//alert("cosa");
	//		$("#i638").attr("disabled", true); 
	//		$("#i639").attr("disabled", true); 
	//	}else
	//	{
	//		$("#i638").attr("disabled", false); 
	//		$("#i639").attr("disabled", false); 
	//	}
	//});
	
	
	//$("#send").click(function(){
	//	if($("#i641").val()==-1)
//		{
//			//alert("cosa");
			//($("#i641").attr("disabled", true); 
//		}
//	});

});



//i638
//i639
//i641



</script>