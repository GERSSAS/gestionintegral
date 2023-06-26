<?php include_once './model/Admin/AdminModel.php';
require_once './phpqrcode/qrlib.php';
require_once('./fpdf185/fpdf.php');
require_once('./FPDI-2.3.6/src/autoload.php');
require_once('./FPDI-2.3.6/src/Fpdi.php');


class AdminController
{

	//Aqui estsamos cerrando sesion.
	public function crearUsuarios()
	{
        include_once './view/Admin/crearUsuario.php';
	}



	public function verUsuarios()
	{
		$objeto = new AdminModel();

		$sql = "SELECT * FROM tbl_usuario WHERE usu_id>3" ;

		$consulta = $objeto->consult($sql);
        include_once './view/Admin/verUsuario.php';
	}

	public function verUsuariosColombia()
	{
		$objeto = new AdminModel();

		$sql = "SELECT * FROM tbl_usuario WHERE usu_sede='COLOMBIA'" ;

		$consulta = $objeto->consult($sql);
        include_once './view/Admin/verUsuario.php';
	}



	public function verUsuariosMexico()
	{
		$objeto = new AdminModel();

		$sql = "SELECT * FROM tbl_usuario WHERE usu_sede='MEXICO'" ;

		$consulta = $objeto->consult($sql);
        include_once './view/Admin/verUsuario.php';
	}

	public function verUsuariosChile()
	{
		$objeto = new AdminModel();

		$sql = "SELECT * FROM tbl_usuario WHERE usu_sede='CHILE'" ;

		$consulta = $objeto->consult($sql);
        include_once './view/Admin/verUsuario.php';
	}

	public function verUsuariosUsa()
	{
		$objeto = new AdminModel();

		$sql = "SELECT * FROM tbl_usuario WHERE usu_sede='USA'" ;

		$consulta = $objeto->consult($sql);
        include_once './view/Admin/verUsuario.php';
	}
	public function postUpdateUsuario(){

		$objeto = new AdminModel();

		$usu_id = $_POST['usuID'];
        $id_contacto = $_POST['id_contacto'];

		$user_tipo = $_POST['tipo'];
		$user_identificacion = $_POST['identificacion'];
		$user_nombres = $_POST['nombres'];
		$user_apellidos = $_POST['apellidos'];
        $user_correo = $_POST['correo'];
		$user_area = $_POST['area'];
		$user_cargo = $_POST['cargo'];
		$user_celular = $_POST['celular'];
		$user_telefono = $_POST['telefonoUser'];
		$user_sede = $_POST['sede'];
		$user_rh = $_POST['rh'];
		$user_eps = $_POST['eps'];
		$user_arl = $_POST['arl'];
		$user_direccion = $_POST['direccion'];


        $nombreContacto = $_POST['nombreContacto2'];
        $parentesco = $_POST['parentesco2'];
        $telefonoContacto = $_POST['telefono2'];
        $direccionContacto = $_POST['direccion2'];

        $sql = "UPDATE tbl_contacto SET nombre_contacto='".$nombreContacto."',
        telefono_contacto='".$telefonoContacto."',
        direccion_contacto='".$direccionContacto."',
        parentesco_contacto='".$parentesco."'  WHERE id_contacto='$id_contacto' ";

        $consulta = $objeto->update($sql);

		$sql = "UPDATE tbl_usuario SET usu_nombre='".$user_nombres."',
		usu_apellido='".$user_apellidos."',
		usu_correo='".$user_correo."',
		usu_celular='".$user_celular."',
        usu_telefono='".$user_telefono."',
		usu_sede='".$user_sede."',
		usu_area='".$user_area."',
		usu_cargo='".$user_cargo."',
		usu_eps='".$user_eps."',
		usu_arl='".$user_arl."',
		usu_rh='".$user_rh."',
		direccion_usuario='".$user_direccion."'
          WHERE usu_id='$usu_id' ";

        $consulta = $objeto->update($sql);

		$sql = "SELECT * FROM tbl_usuario WHERE usu_id='$usu_id'";

		$consulta_usuario = $objeto->consult($sql);
    	$row = $consulta_usuario->fetch_assoc();



		if ($consulta) {

			$path = './images/';
			$qrcode = $path.$user_nombres."_".$user_identificacion.".png";

			// AQUI SE AGREGO CODIGO

			$name         = $user_nombres." ".$user_apellidos;
			$sortName     = '';
			$phone        = '(602) 4897000';
			$phonePrivate = '';
			$phoneCell    = $user_celular;
			$orgName      = 'GERS S.A.S';
			$contacnom =$nombreContacto;
			$telcontac   =$telefonoContacto;

			$email        = $user_correo;
			$website        = 'www.gers.com.co';

			$addressLabel     = 'Calle 3a A #65-118';
			$addressPobox     = '';
			$addressExt       = '';
			$addressStreet    = 'El Refugio';
			$addressTown      = 'Cali';
			$addressPostCode  = '91921-1235';
			$addressCountry   = 'Colombia';

			$codeContents  = 'BEGIN:VCARD'."\n";
			$codeContents .= 'VERSION:2.1'."\n";
			$codeContents .= 'N:'.$sortName."\n";
			$codeContents .= 'FN:'.$name."\n";
			$codeContents .= 'ORG:'.$orgName."\n";
			$codeContents .= 'NOM:'.$contacnom."\n";

			$codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
			$codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
			$codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";
			$codeContents .= 'TEL;TYPE=cell-contacto:'.$telcontac."\n";

			$codeContents .= 'ADR;TYPE=work;'.
				'LABEL="'.$addressLabel.'":'
				.$addressPobox.';'
				.$addressExt.';'
				.$addressStreet.';'
				.$addressTown.';'
				.$addressPostCode.';'
				.$addressCountry
			."\n";

			$codeContents .= 'EMAIL:'.$email."\n";
			$codeContents .= 'URL:'.$website."\n";
			$codeContents .= 'END:VCARD';
			// HASTA AQUI
			QRcode::png($codeContents, $qrcode, QR_ECLEVEL_L, 3);

			$sql="UPDATE tbl_usuario SET url_qr='.$qrcode.'
			WHERE  usu_id='".$usu_id."'";

			$insercion = $objeto->update($sql);
			$nombrefinal = "";

			

			$pdf_foto = $row["usu_img"];

			$pdf = new \setasign\Fpdi\Fpdi('P', 'mm', 'Letter');

			$plantilla = "";

			switch ($user_area) {
  					case "ADMINISTRACION":
    				$plantilla = './images/administracion.pdf';
    				break;
  					case "EPC CONSTRUCCION DE PROYECTOS":
    				$plantilla = './images/EPC.pdf';
    				break;
 					case "DISEÑO E INVENTORIAS":
					$plantilla = './images/DISEÑOS.pdf';
					break;
 					case "EFICIENCIA Y CALIDAD DE LA ENERGIA":
					$plantilla = './images/EFICIENCIA.pdf';
					break;
					case "ESTUDIOS":
					$plantilla = './images/ESTUDIOS.pdf';
					break;
					case "ESTUDIOS INTERNACIONALES":
					$plantilla = './images/ESTUDIO_INTER.pdf';
					break;
					case "NEPLAN":
					$plantilla = './images/NEPLAN.pdf';
					break;
					case "PAC":
					$plantilla = './images/PAC.pdf';
					break;
					case "PROYECTOS GIS":
					$plantilla = './images/PROYECTOS_GIS.pdf';
					break;
					case "SOLUCIONES INTEGRALES DE EQUIPOS":
					$plantilla = './images/SOLUCIONES.pdf';
					break;
			}

			$pdf->setSourceFile($plantilla);

				$tpl = $pdf->importPage(1);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','B',22);
				$pdf->setXY(53, 67);
				$pdf->write(100,utf8_decode ($user_nombres." ". $user_apellidos) );
				//$pdf->setXY(73, 59);
				//$pdf->write(100, $user_apellidos );
				$pdf->SetFont('arial','',20);
				//$pdf->setXY(43, 75);
				//$pdf->write(100,   $user_area);
				$pdf->setXY(53, 95);
				$pdf->write(100,utf8_decode( $user_cargo)) ;
				$pdf->setXY(69, 81);
				$pdf->write(100,  $user_identificacion);
				$pdf->Image($qrcode,100,185); 
				$pdf->Image($pdf_foto,103,31 , 52 , 69,); 
				$pdf->setXY(137, 81); 
				$pdf->write(100, $user_rh );
				$pdf->setXY(139, 110);
				$pdf->write(100, $user_eps );
				$pdf->setXY(71, 110);
				$pdf->write(100, $user_arl );



				$tpl = $pdf->importPage(2);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','',20);
				$pdf->setXY(53, 115);
				$pdf->write(100, $nombreContacto);
				$pdf->setXY(53, 128);
				$pdf->write(100, $parentesco);
				$pdf->setXY(53 , 142);
				$pdf->write(100, $telefonoContacto);
				$pdf->setXY(53 , 156);
				$pdf->write(100, $direccionContacto);

			$url ="./images/".$user_identificacion.".pdf";
			unlink($url);

			$pdf->output($url, "F");


			$pdf = new \setasign\Fpdi\Fpdi('P', 'mm', 'Letter');
			switch ($user_area) {
				case "ADMINISTRACION":
				  $plantilla = './images/administracion_inactivo.pdf';
				  break;
				case "EPC CONSTRUCCION DE PROYECTOS":
				  $plantilla = './images/EPC_INACTIVOS.pdf';
				  break;
			   case "DISEÑO E INVENTORIAS":
				  $plantilla = './images/DISEÑOS_INACTIVO.pdf';
				  break;
			   case "EFICIENCIA Y CALIDAD DE LA ENERGIA":
				  $plantilla = './images/EFICIENCIA_INACTIVOS.pdf';
				  break;
			  case "ESTUDIOS":
				  $plantilla = './images/ESTUDIOS_INACTIVO.pdf';
				  break;
			  case "ESTUDIOS INTERNACIONALES":
				  $plantilla = './images/ESTUDIO_INTER_INACTIVO.pdf';
				  break;
			  case "NEPLAN":
				  $plantilla = './images/NEPLAN_INACTIVO.pdf';
				  break;
			  case "PAC":
				  $plantilla = './images/PAC_INACTIVO.pdf';
				  break;
			  case "PROYECTOS GIS":
				  $plantilla = './images/PROYECTOS_GIS_INACTIVO.pdf';
				  break;
			  case "SOLUCIONES INTEGRALES DE EQUIPOS":
				  $plantilla = './images/SOLUCIONES_INACTIVO.pdf';
				  break;
			}

	 		$pdf->setSourceFile($plantilla);

			 $tpl = $pdf->importPage(1);
			 $pdf->addPage();
			 $pdf->useTemplate($tpl);
			 $pdf->SetFont('Arial','B',22);
			 $pdf->setXY(53, 67);
			 $pdf->write(100,utf8_decode ($user_nombres." ". $user_apellidos) );
			 //$pdf->setXY(73, 59);
			 //$pdf->write(100, $user_apellidos );
			 $pdf->SetFont('arial','',20);
			 //$pdf->setXY(43, 75);
			 //$pdf->write(100,   $user_area);
			 $pdf->setXY(53, 95);
			 $pdf->write(100,utf8_decode( $user_cargo)) ;
			 $pdf->setXY(69, 81);
			 $pdf->write(100,  $user_identificacion);
			 $pdf->Image($qrcode,100,185); 
			 $pdf->Image($pdf_foto,103,31 , 52 , 69,); 
			 $pdf->setXY(137, 81); 
			 $pdf->write(100, $user_rh );
			 $pdf->setXY(139, 110);
			 $pdf->write(100, $user_eps );
			 $pdf->setXY(71, 110);
			 $pdf->write(100, $user_arl );



			 $tpl = $pdf->importPage(2);
			 $pdf->addPage();
			 $pdf->useTemplate($tpl);
			 $pdf->SetFont('Arial','',20);
			 $pdf->setXY(53, 115);
			 $pdf->write(100, $nombreContacto);
			 $pdf->setXY(53, 128);
			 $pdf->write(100, $parentesco);
			 $pdf->setXY(53 , 142);
			 $pdf->write(100, $telefonoContacto);
			 $pdf->setXY(53 , 156);
			 $pdf->write(100, $direccionContacto);

	  		$url ="./images/".$user_identificacion."_inactivo.pdf";
			unlink($url);
	  		$pdf->output($url, "F");

	  		ob_end_flush();

			$objeto->close();

			redirect(getUrl("admin", "admin", "verUsuarios"));

			 echo "<script>alert('El usuario actualizado exitosamente.');</script>";

		} else {
			redirect(getUrl("admin", "admin", "verUsuarios"));

		}

	}
	public function updateUsuario()
	{
		$objeto = new AdminModel();

		$usu_id = $_GET['usu_id'];
		$sql = "SELECT * FROM tbl_usuario WHERE usu_id='$usu_id'";

		$consulta = $objeto->consult($sql);

		$sql2 = "SELECT * FROM tbl_contacto_empresa WHERE usu_id='$usu_id'";

		$consulta2 = $objeto->consult($sql2);

		$sql3 = "SELECT * FROM tbl_contacto WHERE id_usuario_contacto='$usu_id'";

		$consulta3 = $objeto->consult($sql3);

        include_once './view/Admin/editarUsuario.php';
	}

	public function eliminarUsuario()
	{
		$objeto = new AdminModel();

		$usu_id = $_GET['usu_id'];

		$sql = "DELETE FROM tbl_contacto WHERE  id_usuario_contacto='$usu_id'";
		$query = $objeto->delete($sql);
		$sql = "DELETE FROM tbl_usuario WHERE  usu_id='$usu_id'"; 
        $query = $objeto->delete($sql);

		$sql = "SELECT * FROM tbl_usuario WHERE usu_id>3";

		$consulta = $objeto->consult($sql);
		$objeto->close();
        include_once './view/Admin/verUsuario.php';
	}

	public function cambiarEstado()
	{
		$objeto = new AdminModel();

		$usu_id = $_GET['usu_id'];

		$sql = "SELECT estado FROM tbl_usuario WHERE  usu_id='$usu_id'";

		$consulta = $objeto->consult($sql);
		$fila = mysqli_fetch_row($consulta);

		if($fila[0] =="Activo"){
			$sql = "UPDATE tbl_usuario set estado='Desactivo' WHERE  usu_id='$usu_id'";
		}else{
			$sql = "UPDATE tbl_usuario set estado='Activo' WHERE  usu_id='$usu_id'";
		}

		$consulta = $objeto->update($sql);
		// $objeto->close();
	}


	public function verDetalleUsuario()
	{
		$objeto = new AdminModel();

		$usu_id = $_GET['usu_id'];

		$sql = "SELECT * FROM tbl_usuario WHERE usu_id='$usu_id'";
		$verDetalleUsuario = $objeto->consult($sql);

		include_once './view/partials/modals/verDetalleUsuario.php';
	}
	//se reciben los datos para ingresar
	public function postCrearUsuarios()
	{
        $objeto = new AdminModel();

		$user_id = $objeto->autoincrement("tbl_usuario", "usu_id");
		$user_tipo = $_POST['tipo'];
		$user_identificacion = $_POST['identificacion'];
		$user_nombres = $_POST['nombres'];
		$user_apellidos = $_POST['apellidos'];
		$user_tipo = $_POST['tipo'];
        $user_correo = $_POST['correo'];
		$user_area = $_POST['area'];
		$user_cargo = $_POST['cargo'];
		$user_celular = $_POST['celular'];
		$user_telefono = $_POST['telefonoUser'];
		$user_sede = $_POST['sede'];
		$user_rh = $_POST['rh'];
		$user_eps = $_POST['eps'];
		$user_arl = $_POST['arl'];
		$user_direccion = $_POST['direccionUser'];

		$nombreContacto2 = $_POST['nombreContacto2'];
		$parentesco2 = $_POST['parentesco2'];
		$telefono2 = $_POST['telefono2'];
		$direccion2 = $_POST['direccion2'];

		$sql = "INSERT INTO tbl_usuario VALUES ('" . $user_id . "',
		'".$user_tipo."',
		'".$user_identificacion."',
		'".$user_nombres."',
		 '".$user_apellidos."',
		 '".$user_correo."',
		  '".$user_celular."',
		  '".$user_telefono."',
		  '".$user_sede."',
		   '".$user_area."',
		   '".$user_cargo."',
		    '".$user_eps."',
			'".$user_arl."',
			'".$user_rh."',
			'".$user_direccion."',
			  '2',
			   'Activo',
			    ' ', ' ', ' ', ' ')";

		$insercion = $objeto->insert($sql);

		$contacto_id = $objeto->autoincrement("tbl_contacto", "id_contacto");
		$sql2 = "INSERT INTO tbl_contacto VALUES (
			'" .$contacto_id."',
			'" .$user_id."',
			'" .$nombreContacto2."',
			'" .$telefono2."',
			'" .$direccion2."',
			'" .$parentesco2."'
        )";

        $consulta2 = $objeto->update($sql2);

		if ($insercion) {

			$path = './images/';
			$qrcode = $path.$user_nombres."_".$user_identificacion.".png";
			
			// AQUI SE AGREGO CODIGO
			
			$name         = $user_nombres." ".$user_apellidos;
			$sortName     = '';
			$phone        = '(602) 4897000';
			$phonePrivate = '';
			$phoneCell    = $user_celular;
			$orgName      = 'GERS S.A.S';
			$contacnom =$nombreContacto2;
			$telcontac   =$telefono2;
			
			$email        = $user_correo;
			$website        = 'www.gers.com.co';
			
			$addressLabel     = 'Calle 3a A #65-118';
			$addressPobox     = '';
			$addressExt       = '';
			$addressStreet    = 'El Refugio';
			$addressTown      = 'Cali';
			$addressPostCode  = '91921-1235';
			$addressCountry   = 'Colombia';

			$codeContents  = 'BEGIN:VCARD'."\n";
			$codeContents .= 'VERSION:2.1'."\n";
			$codeContents .= 'N:'.$sortName."\n";
			$codeContents .= 'FN:'.$name."\n";
			$codeContents .= 'ORG:'.$orgName."\n";
			$codeContents .= 'NOM:'.$contacnom."\n";

			$codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
			$codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
			$codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";
			$codeContents .= 'TEL;TYPE=cell-contacto:'.$telcontac."\n";

			$codeContents .= 'ADR;TYPE=work;'.
				'LABEL="'.$addressLabel.'":'
				.$addressPobox.';'
				.$addressExt.';'
				.$addressStreet.';'
				.$addressTown.';'
				.$addressPostCode.';'
				.$addressCountry
			."\n";

			$codeContents .= 'EMAIL:'.$email."\n";
			$codeContents .= 'URL:'.$website."\n";
			$codeContents .= 'END:VCARD';
			// HASTA AQUI
			QRcode::png($codeContents, $qrcode, QR_ECLEVEL_L, 3);

			$sql="UPDATE tbl_usuario SET url_qr='.$qrcode.'
			WHERE  usu_id='".$user_id."'";

			$insercion = $objeto->update($sql);
			$nombrefinal = "";
			if (isset($_FILES['usu_img'])) {

				$nombrefinal = basename($_FILES['usu_img']['name']);
				$ruta = "C:/xampp/htdocs/gestionintegral/img/" . $nombrefinal;
				move_uploaded_file($_FILES['usu_img']["tmp_name"], $ruta);
				$usu_img = $ruta;

				$sql="UPDATE tbl_usuario SET usu_img='./img/$nombrefinal'
				WHERE  usu_id='".$user_id."'";

				$insercion = $objeto->update($sql);

				$pdf_foto = "./img/".$nombrefinal."";

				$pdf = new \setasign\Fpdi\Fpdi('P', 'mm', 'Letter');

				$plantilla = "";

				switch ($user_area) {
  						case "ADMINISTRACION":
    					$plantilla = './images/administracion.pdf';
    					break;
  						case "EPC CONSTRUCCION DE PROYECTOS":
    					$plantilla = './images/EPC.pdf';
    					break;
 						case "DISEÑO E INVENTORIAS":
						$plantilla = './images/DISEÑOS.pdf';
						break;
 						case "EFICIENCIA Y CALIDAD DE LA ENERGIA":
						$plantilla = './images/EFICIENCIA.pdf';
						break;
						case "ESTUDIOS":
						$plantilla = './images/ESTUDIOS.pdf';
						break;
						case "ESTUDIOS INTERNACIONALES":
						$plantilla = './images/ESTUDIO_INTER.pdf';
						break;
						case "NEPLAN":
						$plantilla = './images/NEPLAN.pdf';
						break;
						case "PAC":
						$plantilla = './images/PAC.pdf';
						break;
						case "PROYECTOS GIS":
						$plantilla = './images/PROYECTOS_GIS.pdf';
						break;
						case "SOLUCIONES INTEGRALES DE EQUIPOS":
						$plantilla = './images/SOLUCIONES.pdf';
						break;
				}

				$pdf->setSourceFile($plantilla);

				$tpl = $pdf->importPage(1);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','B',22);
				$pdf->setXY(53, 67);
				$pdf->write(100,utf8_decode ($user_nombres." ". $user_apellidos) );
		//$pdf->setXY(73, 59);
		//$pdf->write(100, $user_apellidos );
				$pdf->SetFont('arial','',20);
		//$pdf->setXY(43, 75);
		//$pdf->write(100,   $user_area);
				$pdf->setXY(53, 95);
				$pdf->write(100,utf8_decode( $user_cargo)) ;
				$pdf->setXY(69, 81);
				$pdf->write(100,  $user_identificacion);
				$pdf->Image($qrcode,100,185); 
				$pdf->Image($pdf_foto,103,31 , 52 , 69,); 
				$pdf->setXY(137, 81); 
				$pdf->write(100, $user_rh );
				$pdf->setXY(139, 110);
				$pdf->write(100, $user_eps );
				$pdf->setXY(71, 110);
				$pdf->write(100, $user_arl );



				$tpl = $pdf->importPage(2);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','',20);
				$pdf->setXY(53, 115);
				$pdf->write(100,utf8_decode ($nombreContacto2));
				$pdf->setXY(53, 128);
				$pdf->write(100, $parentesco2);
				$pdf->setXY(53 , 142);
				$pdf->write(100, $telefono2);
				$pdf->setXY(53 , 156);
				$pdf->write(100, $direccion2);
				
				$url ="./images/".$user_identificacion.".pdf";
			
				$pdf->output($url, "F");


				$sql="UPDATE tbl_usuario SET url_pdf='$url'
				WHERE  usu_id='".$user_id."'";

				$insercion = $objeto->update($sql);

				$pdf = new \setasign\Fpdi\Fpdi('P', 'mm', 'Letter');
				switch ($user_area) {
					case "ADMINISTRACION":
				  $plantilla = './images/administracion_inactivo.pdf';
				  break;
					case "EPC CONSTRUCCION DE PROYECTOS":
				  $plantilla = './images/EPC_INACTIVOS.pdf';
				  break;
				   case "DISEÑO E INVENTORIAS":
				  $plantilla = './images/DISEÑOS_INACTIVO.pdf';
				  break;
				   case "EFICIENCIA Y CALIDAD DE LA ENERGIA":
				  $plantilla = './images/EFICIENCIA_INACTIVOS.pdf';
				  break;
				  case "ESTUDIOS":
				  $plantilla = './images/ESTUDIOS_INACTIVO.pdf';
				  break;
				  case "ESTUDIOS INTERNACIONALES":
				  $plantilla = './images/ESTUDIO_INTER_INACTIVO.pdf';
				  break;
				  case "NEPLAN":
				  $plantilla = './images/NEPLAN_INACTIVO.pdf';
				  break;
				  case "PAC":
				  $plantilla = './images/PAC_INACTIVO.pdf';
				  break;
				  case "PROYECTOS GIS":
				  $plantilla = './images/PROYECTOS_GIS_INACTIVO.pdf';
				  break;
				  case "SOLUCIONES INTEGRALES DE EQUIPOS":
				  $plantilla = './images/SOLUCIONES_INACTIVO.pdf';
				  break;
		  		}

		  		$pdf->setSourceFile($plantilla);

		  		$tpl = $pdf->importPage(1);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','B',22);
				$pdf->setXY(53, 67);
				$pdf->write(100,utf8_decode ($user_nombres." ". $user_apellidos) );
		//$pdf->setXY(73, 59);
		//$pdf->write(100, $user_apellidos );
				$pdf->SetFont('arial','',20);
		//$pdf->setXY(43, 75);
		//$pdf->write(100,   $user_area);
				$pdf->setXY(53, 95);
				$pdf->write(100,utf8_decode( $user_cargo)) ;
				$pdf->setXY(69, 81);
				$pdf->write(100,  $user_identificacion);
				$pdf->Image($qrcode,100,185); 
				$pdf->Image($pdf_foto,103,31 , 52 , 69,); 
				$pdf->setXY(137, 81); 
				$pdf->write(100, $user_rh );
				$pdf->setXY(139, 110);
				$pdf->write(100, $user_eps );
				$pdf->setXY(71, 110);
				$pdf->write(100, $user_arl );



				$tpl = $pdf->importPage(2);
				$pdf->addPage();
				$pdf->useTemplate($tpl);
				$pdf->SetFont('Arial','',20);
				$pdf->setXY(53, 115);
				$pdf->write(100,utf8_decode ($nombreContacto2));
				$pdf->setXY(53, 128);
				$pdf->write(100, $parentesco2);
				$pdf->setXY(53 , 142);
				$pdf->write(100, $telefono2);
				$pdf->setXY(53 , 156);
				$pdf->write(100, $direccion2);

		  		$url ="./images/".$user_identificacion."_inactivo.pdf";
				
		  		$pdf->output($url, "F");

		  		ob_end_flush();


				$objeto->close();

				redirect(getUrl("admin", "admin", "verUsuarios"));

				echo "<script>alert('El usuario ha sido creado exitosamente.');</script>";

			} else {
				$usu_img = NULL;
			}

	} else {
		redirect(getUrl("admin", "admin", "verUsuarios"));

	}

	}
}


?>