<body>
<?php
session_start();

if(!isset($_SESSION["autenticado"])){
	header("Location: log.php");
	exit();
}
?>
</body>