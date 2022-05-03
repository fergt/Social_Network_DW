<?php
    // conectar con el servidor godaddy
    $cons_usuario="UsuarioP2";
    $cons_contra="UsuarioP2";
    $cons_base_datos="DESAR";
    $cons_equipo="107.180.9.193:3306";

	$link =  mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
	//$link = mysqli_connect("localhost", "root", "","proyecto01-u");

	// verificar conexion
 if(!$link){
        die("imposible conectarse: ".mysqli_error($link));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>