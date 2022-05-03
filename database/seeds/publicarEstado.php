
<?php
	include 'conexion.php';
	function nuevo_estado($id,$usrestado){
				global $link;
			$q="INSERT INTO DESAR.PUBLICACIONES (ID_PUBLICACION,ID_USUARIO,FECHA,COMENTARIO,ID_IMAGEN,ID_PUBLICACION_TIPO) 
				VALUES ( LAST_INSERT_ID(), '3', CURRENT_TIMESTAMP(), '$usrestado', '1', '2' )";
			//$q="update DESAR.USUARIO set NOMBRES='$usrnombre', APELLIDOS='$usrapellido',FECHA_NAC='$usrfecha_nac',EMAIL='$usremail' where ID_USUARIO='3'";
			if(mysqli_query($link, $q)){
				echo "<script language='javascript'>
					alert('Perfil Actualizado');
					window.location = 'perfilUsuario.php';		
					</script>";
			}
			else{
			echo "<script language='javascript'>
				alert('Error no se pudo actualizar');
				window.location = 'perfilUsuario.php';
				</script>";	
				}
		}

	if(isset($_POST['nuevoestado'])){
		$usrestado=$_POST['nuevoestado'];
		nuevo_estado('',$usrestado);
	}
?>

