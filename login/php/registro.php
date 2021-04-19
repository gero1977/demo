<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);
		$mail=$_POST['mail'];
		$telefono=$_POST['telefono'];
		$comercial=$_POST['comercial'];
		$descripcion=$_POST['descripcion'];
		$diames=date(d);
        $mesano=date(m);
        $ano=date(Y);
        $fecha = "$ano-$mesano-$diames";
	

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre,apellido,usuario,password, fecha, mail, telefono, comercial, descripcion )
				values ('$nombre','$apellido','$usuario','$password', '$fecha', '$mail', '$telefono', '$comercial',  
				'$descripcion')";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from usuarios 
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>