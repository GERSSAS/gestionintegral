<?php
include_once './model/Login/LoginModel.php';

class LoginController
{

	//Aqui estsamos cerrando sesion.
	public function logout()
	{
		session_destroy();
		redirect("login.php");
	}
	//se reciben los datos para ingresar
	public function postLogin()
	{
        $obj = new LoginModel();
        
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        //pregunta si me llega una consulta y si el campo de valido es null, para que valide su cuenta

        $selectedPass = "SELECT usu_password FROM tbl_usuario WHERE usu_correo='$correo'";

        $passord_V = $obj->consult($selectedPass);

            //pregunta si me llega mas de una consulta
            if (mysqli_num_rows($passord_V) > 0) {
                foreach ($passord_V as $pass) {
                    $hash_verify_db = $pass['usu_password'];
                }
              
                if (password_verify($password, $hash_verify_db)) {

                    $sqlUser = "SELECT usu_id, usu_nombre, usu_apellido, usu_correo, usu_password, rol_id FROM tbl_usuario WHERE usu_correo='" . $correo . "' AND usu_password='" . $hash_verify_db . "' AND rol_id=1";
                    $usuario = $obj->consult($sqlUser);
                    if (mysqli_num_rows($usuario) > 0) {
                        foreach ($usuario as $user) {

                            $_SESSION['nameUser'] = $user['usu_nombre'];
                            $_SESSION['surnameUser'] = $user['usu_apellido'];
                            $_SESSION['rolId'] = $user['rol_id'];
                            $_SESSION['idUser'] = $user['usu_id'];
                            $_SESSION['auth'] = "ok";
                        }
                      
                        redirect("indexAdmin.php");
                    }
                    $sqlUser2 = "SELECT usu_id, usu_nombre, usu_apellido, usu_correo, usu_password, rol_id FROM tbl_usuario WHERE usu_correo='" . $correo . "' AND usu_password='" . $hash_verify_db . "' AND rol_id=2";
                    $usuario2 = $obj->consult($sqlUser2);
                    if (mysqli_num_rows($usuario2) > 0) {
                        foreach ($usuario2 as $user) {

                            $_SESSION['nameUser'] = $user['usu_nombre'];
                            $_SESSION['surnameUser'] = $user['usu_apellido'];
                            $_SESSION['rolId'] = $user['rol_id'];
                            $_SESSION['idUser'] = $user['usu_id'];
                            $_SESSION['auth'] = "ok";
                        }
                        redirect("index.php");
                    } else {
                        echo "<script>alert('El correo o contraseña no coinciden, vuelva a intentarlo'); </script>";
                        redirect('login.php');
                    }
                } else {
                    //alerta de que no coincide la contraseña
                    echo "<script>alert('El correo o contraseña no coinciden, vuelva a intentarlo'); </script>";
                    redirect('login.php');
                }
            } else {
                echo "<script>alert('El correo o la contraseña son incorrectos'); </script>";
                redirect('login.php');
            }
    }
}

?>