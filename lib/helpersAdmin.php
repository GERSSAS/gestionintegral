<?php
session_start();
//esta fucio es la que nos redirecciona a la vista o funcion deseada.
function redirect($url) {
	echo "<script type='text/javascript'>window.location.href='$url'</script>";
}
//funcion para las alertas que deseemos
function alert($message) {
	echo "<script>alert('$message')</script>";
}

//funcion para ver el contenido de una variable
function dd($var) {
	echo "<pre>";
	die(print_r($var));
}

//url de la pagina
function getUrl($modulo,$controlador,$funcion,$parametros=false,$pagina=false) {

	if ($pagina==false) {
		$pagina = "indexAdmin";
	}

	$url = "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

	if ($parametros) {
		foreach ($parametros as $key => $valor) {
			$url.="&$key=$valor";
		}
	}
	return $url;
}

// esta funcion ayuda a saber si se a creado la funcion, el controlador o el modulo.
// El modulo es la carpeta, el controlador es el archivo ejemplo: inerruptoresbtController
function resolve(){
	$modulo = ucwords($_GET['modulo']);
	$controlador = ucwords($_GET['controlador']);
	$funcion = $_GET['funcion'];

	if (is_dir("./controller/$modulo")) {
		if (file_exists("./controller/$modulo/".$controlador."Controller.php")) {
			include_once "./controller/$modulo/".$controlador."Controller.php";

			$nombreClase = $controlador."Controller";
			$objClase = new $nombreClase();

			if (method_exists($objClase, $funcion)) {
				$objClase->$funcion();
			}else{
				echo "La funcion especificada no existe";
			}
		}else{
			echo "El controlador especificado no existe";
		}
	}else{
		echo "el modulo especificado no existe";
	}
}
?>