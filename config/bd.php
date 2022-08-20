
<?php
	$conexion = new mysqli("localhost","root","","nomina"); 
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>