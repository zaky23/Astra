<?php
require 'Login.php';

session_start();

$usuario="";
$clave="";

$usuario=$_POST['Correo'];
$clave=md5($_POST['Contraseña']);

$query="SELECT * FROM admins WHERE Correo= '$usuario' AND Contraseña= '$clave'";

$consulta= mysqli_query($conexion, $query);

$cantidad= mysqli_num_rows($consulta);

if($cantidad>0){
	$_SESSION["autenticado"]="si";
	$_SESSION['nombre_usuario']= $usuario;
	header("location: InicioAdmin.php");
	
}else{
	
$query="SELECT * FROM usuarios WHERE Correo= '$usuario' AND Contraseña= '$clave'";

$consulta= mysqli_query($conexion, $query);

$cantidad= mysqli_num_rows($consulta);

if($cantidad>0){
	session_start();
	$_SESSION["autenticado"]="si";
	$_SESSION['nombre_usuario']= $usuario;
	$_SESSION['Correo'] = $correo;
    $_SESSION['imagen'] = mysqli_fetch_assoc($consulta)['imagen'];
	header("location: index.php");
}else{
	echo'<script>alert("El nombre de usuario o la contraseña son incorrectos. Intente de nuevo")</script>';
	header("Location: Login.php?errorusuario=si");
}	
}
?>