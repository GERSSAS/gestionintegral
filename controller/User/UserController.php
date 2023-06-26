<?php
include_once './model/User/UserModel.php';
require_once './phpqrcode/qrlib.php';

class userController
{
	public function datosUsuarios()
	{
		$objeto = new UserModel();

		$usu_id = $_GET['usu_id'];
		$sql = "SELECT * FROM tbl_usuario WHERE usu_id='$usu_id'";

		$consulta = $objeto->consult($sql);

        include_once './view/User/carnet.php';
	}

  public function obtener_carnet()
	{
		$objeto = new UserModel();
    $usu_cedula = $_POST['cedula'];

		$sql = "SELECT * FROM tbl_usuario WHERE usu_identificacion='$usu_cedula'";

		$consulta = $objeto->consult($sql);
    $row = $consulta->fetch_assoc();
    $url_website = 'http://'.$_SERVER['HTTP_HOST'].'/gestionintegral';
    if(isset($row["usu_id"]) == Null){
      echo  "<h1 class='text-center'> Usuario no registrado </h1>";
    } else {

      $pdf_requerido = "";

      if($row['estado'] == "Desactivo") {
          $pdf_requerido = "_inactivo";
      }

      echo  " <h1 class='text-center' style='color:black;'><a id='carnet_digital' href='".$url_website.$row["url_pdf"].$pdf_requerido."#toolbar=0'>Tu carnet digital.</a></h1> ";
    }

	}
    public function contactos()
	{
		$objeto = new UserModel();

		$usu_id = $_GET['usu_id'];
		$sql = "SELECT * FROM tbl_contacto WHERE id_usuario_contacto='$usu_id'";

		$consulta = $objeto->consult($sql);

        $sql = "SELECT * FROM tbl_contacto_empresa WHERE usu_id='$usu_id'";

		$consulta2 = $objeto->consult($sql);

        include_once './view/User/infoA.php';
	}

    public function consultarPaises()
    {

      $obj = new UserModel();
      if (!empty($_POST["id_pais"])) {
        // Fetch state data based on the specific country 
        $query = "SELECT * FROM estados WHERE id_pais = " . $_POST['id_pais'] . " ORDER BY nombre_estado ASC";
        $result = $obj->consult($query);
  
        // Generate HTML of state options list 
  
        if ($result->num_rows > 0) {
          echo '<option value="">Selecionar Estado/Provincia</option>';
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id_estado'] . '">' . $row['nombre_estado'] . '</option>';
          }
        } else {
          echo '<option value="">Estado/provincia no disponible</option>';
        }
      } elseif (!empty($_POST["id_estado"])) {
        // Fetch city data based on the specific state 
        $query = "SELECT * FROM ciudades WHERE id_estado = " . $_POST['id_estado'] . " ORDER BY nombre_ciudad ASC";
        $result = $obj->consult($query);
  
        // Generate HTML of city options list 
        if ($result->num_rows > 0) {
          echo '<option value="">Seleccionar ciudad</option>';
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id_ciudad'] . '">' . $row['nombre_ciudad'] . '</option>';
          }
        } else {
          echo '<option value="">Ciudad no disponible</option>';
        }
      }
    }






    public function postUpdateDatos()
    {
       $objeto = new UserModel();

       $user_tipo = $_POST['tipo'];
       $user_id = $_POST['usuID'];
       $user_identificacion = $_POST['identificacion'];
       $user_nombres = $_POST['nombres'];
       $user_apellidos = $_POST['apellidos'];
       $user_tipo = $_POST['tipo'];
       $user_correo = $_POST['correo'];
       $user_area = $_POST['area'];
       $user_cargo = $_POST['cargo'];
       $user_telefono = $_POST['telefono'];
       $user_celular = $_POST['celular'];
       $user_rh = $_POST['rh'];
       $user_eps = $_POST['eps'];
       $user_arl = $_POST['arl'];


       $sql = "UPDATE tbl_usuario
       SET usu_celular = '" . $user_celular . "',
       usu_nombre = '" . $user_nombres . "',
       usu_apellido = '" . $user_apellidos . "',
       usu_telefono = '" . $user_telefono . "',
       usu_area = '" . $user_area . "',
       usu_cargo = '" . $user_cargo . "',
       usu_eps = '" . $user_eps . "',
       usu_arl = '" . $user_arl . "',
       usu_rh = '" . $user_rh . "'
       WHERE usu_id = '$user_id'";

       $insercion = $objeto->update($sql);

       redirect(getUrl("user", "user", "datosUsuarios", array("usu_id" => $user_id)));
   }

    public function datosComplementarios()
	{
		$objeto = new UserModel();

		$usu_id = $_GET['usu_id'];
		$sql = "SELECT * FROM tbl_usuario WHERE usu_id='$usu_id'";

		$consulta = $objeto->consult($sql);

        $query = "SELECT * FROM paises ORDER BY nombre_pais";
        $result = $objeto->consult($query);
        include_once './view/User/datosc.php';
	}

    public function postUpdateDatosC(){

        $objeto = new UserModel();

		$usu_id = $_POST['usuID'];
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];


        $sql = "UPDATE tbl_usuario SET direccion_usuario='".$direccion."',
        barrio_usuario='".$barrio."',
        usu_telefono='".$telefono."',
        usu_celular='".$celular."',
        usu_correo='".$correo."'
        WHERE usu_id='$usu_id' ";

        $consulta = $objeto->update($sql);

        redirect(getUrl("user", "user", "datosComplementarios", array("usu_id" => $usu_id)));
        

    }




    public function postUpdateContacto(){

        $objeto = new UserModel();

		$usu_id = $_POST['usuID'];
        $id_contacto = $_POST['id_contacto'];
        $nombreContacto = $_POST['nombreContacto'];
        $parentesco = $_POST['parentescoContacto'];
        $telefonoContacto = $_POST['telefonoContacto'];
        $direccionContacto = $_POST['direccionContacto'];

        $sql = "UPDATE tbl_contacto SET nombre_contacto='".$nombreContacto."',
        telefono_contacto='".$telefonoContacto."',
        direccion_contacto='".$direccionContacto."',
        parentesco_contacto='".$parentesco."'  WHERE id_contacto='$id_contacto' ";

        $consulta = $objeto->update($sql);
        
        redirect(getUrl("user", "user", "contactos", array("usu_id" => $usu_id)));
    }
}
