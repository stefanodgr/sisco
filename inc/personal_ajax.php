<?php

    // -------------------------- REGISTRO DE FUNCIONES XAJAX -------------------------- //
	$xajax->registerFunction('buscarMunicipio');
	$xajax->registerFunction('buscarParroquia');
	$xajax->registerFunction('buscarCentroVo');
	$xajax->registerFunction('gestionPersonal');
    // --------------------------------------------------------------------------------- //

	function buscarMunicipio($idEstado){
		global $objResponse;
		
		$miMunicipio = new Municipio();
		$miMunicipio->setObjeto('Estado',$idEstado);
		$arrMunicipio = $miMunicipio->consultar();

		if($arrMunicipio){
			$html = "<select id='comboMunicipio' >";
			$html = "<option>Seleccione....</option>";
			foreach($arrMunicipio as 	$i=>$unMuni){	
				 	$idMuni		=	$unMuni->getAtributo('municipio_id');
				 	$nombreMuni =	$unMuni->getAtributo('municipio_desc');
					 $html .="<option value=".$idMuni.">".$nombreMuni."</option>";
				
			}
			$html .="</select>";

			// $objResponse->addAppend('comboMunicipio','innerHTML',$html);addAssign
			$objResponse->addAssign('comboMunicipio','innerHTML',$html);
			// $objResponse->addClear('comboMunicipio','innerHTML');
		}else{
			$objResponse->addAlert('Este Estado no contiene Municipios');
			$objResponse->addClear('comboMunicipio','innerHTML');
		}
		return $objResponse;
	}

	function buscarParroquia($idMunicipio){
		global $objResponse;
		// $objResponse->addAlert("--->LLEGO".$idMunicipio);
		
		$miParro = new Parroquia();
		$miParro->setObjeto('Municipio',$idMunicipio);
		$arrParro = $miParro->consultar();

		if($arrParro){
			$html = "<select id='comboParroquia' >";
			$html = "<option>Seleccione....</option>";
			foreach($arrParro as 	$i=>$unParro){	
				 	$idParro		=	$unParro->getAtributo('parroquia_id');
				 	$nombreParro 	=	$unParro->getAtributo('parroquia_desc');
					 $html .="<option value=".$idParro.">".$nombreParro."</option>";
				
			}
			$html .="</select>";
			$objResponse->addClear('comboParroquia','innerHTML');
			// $objResponse->addAppend('comboMunicipio','innerHTML',$html);addAssign
			$objResponse->addAssign('comboParroquia','innerHTML',$html);
		}else{
			$objResponse->addAlert('Este Municipio no contiene Parroquias');
			$objResponse->addClear('comboParroquia','innerHTML');
		}
		return $objResponse;
	}

	function buscarCentroVo($idParroquia){
		global $objResponse;
		// $objResponse->addAlert("--->LLEGO".$idMunicipio);
		
		$miCentroVo = new CetroVotacion();
		$miCentroVo->setObjeto('Parroquia',$idParroquia);
		$arrCentroVo = $miCentroVo->consultar();

		if($arrCentroVo){
			$html = "<select id='comboCentroVo' >";
			$html = "<option>Seleccione....</option>";
			foreach($arrCentroVo as 	$i=>$unCentro){	
				 	$idCentro		=	$unCentro->getAtributo('cv_id');
				 	$nombreCentro 	=	$unCentro->getAtributo('cv_desc');
					 $html .="<option value=".$idCentro.">".$nombreCentro."</option>";
				
			}
			$html .="</select>";
			$objResponse->addClear('comboCentroVo','innerHTML');
			// $objResponse->addAppend('comboMunicipio','innerHTML',$html);addAssign
			$objResponse->addAssign('comboCentroVo','innerHTML',$html);
		}else{
			$objResponse->addAlert('Esta Parroquia no contiene Centro de Votacion');
			$objResponse->addAssign('comboCentroVo','innerHTML',$html);
		}
		return $objResponse;
	}

	function gestionPersonal($persId,$accion,$persCedula,$persNombre,$persApellido,$persTipTelf,$persTelf,$persCorreo,$persCentroVo,$persElectoral,$persMilita,$persPostu){
		global $objResponse;

		 if($_SESSION['PerfilUsuario'] != 'SISTEMAS') $perfilId = false;  // PARA ASEGURAR QUE SÓLO UN USUARIO CON PERFIL SISTEMAS PUEDA MODIFICAR LOS PERFILES
		 
		$conexion = new ConexionBd();

		if($accion != 'eliminar'){
			if($usuId) $accion = 'modificar';
			else $accion = 'agregar';
		}

		if($accion == 'agregar'){
			            
            $personal = new Personal();
            $personal->setAtributo('pers_cedula',$persCedula);
            $personal->setAtributo('pers_nombre',utf8_encode(strtoupper($persNombre." ".$persApellido)));
			$personal->setAtributo('pers_telf',$persTipTelf.$persTelf);
			$personal->setAtributo('pers_correo',utf8_encode(strtoupper($persCorreo)));

			$personal->setObjeto('CetroVotacion',$persCentroVo);
			$personal->setObjeto('Electoral',$persElectoral);
			$personal->setObjeto('Militancia',$persMilita);
			$personal->setObjeto('Postulacion',$persPostu);

            $ctrlBd = $personal->registrar();

            if(!$ctrlBd){
				$objResponse->addAlert("No se puede Registrar");
				$objResponse->addScriptCall("actualizarIframePers");
            }else{
                $objResponse->addAlert("Registro Exitoso..");
				$objResponse->addScriptCall("actualizarIframePers");
				$objResponse->addClear('comboMunicipio','innerHTML');
				$objResponse->addClear('comboParroquia','innerHTML');
				$objResponse->addClear('comboCentroVo','innerHTML');
            }

            $msgError = utf8_decode("ERROR1F20022018: Comuníquese con el administrador del sistema.");
		}
		if($accion == 'modificar'){
			$usuario = new Usuario(null,$usuId);
			// $usuario = new Usuario(null,$persId);
			$ctrlBd = $usuario->modificar();

			if($ctrlBd){
				if($perfilId){
					if($ctrlRelPerfilUsu){
						$ctrlBdRel = $conexion->hacerUpdate('rel_perfil_usuario','perfil_id = '.$perfilId, 'usuario_id = '.$usuId);
					}
					else{
						$relPerfiUsu = new PerfilUsuario();
						$relPerfiUsu->setObjeto('Usuario',$usuId);
						$relPerfiUsu->setObjeto('Perfil',$perfilId);
						$ctrlBdRel = $relPerfiUsu->registrar();
					}
					if(!$ctrlBdRel){
						$msgError = utf8_decode("ERROR3F: Comuníquese con el administrador del sistema.");
						$ctrlBd = false;
					}
				}
				$objResponse->addScriptCall('actualizarIframe');
			}
			$msgError = utf8_decode("ERROR4F: Comuníquese con el administrador del sistema.");
			// $objResponse->addScriptCall('actualizarIframe');
		}
		if($accion == 'eliminar'){
			$conexion = new ConexionBd();
			$arrUsuario = explode(',',$usuId);
			// (var_export($arrUsuario,true) );
			$usuario = new Usuario();
			foreach ($arrUsuario as $dato){
				// $objResponse->addAlert("--->".$dato);
				$usuario->setAtributo("usuario_id",$dato);
				$arrUsu = $usuario->consultar();
				$status = $arrUsu[0]->getAtributo("usuario_activo");
				if ($status=="t"){
				   
					$usuario->setAtributo('usuario_activo','false');
					$usuario->modificar();   
				
				}else{
					$usuario->setAtributo('usuario_activo',true);
					$usuario->modificar(); 
				}
			}
			$objResponse->addScriptCall('actualizarIframe');
		}
		$msgError = utf8_decode("ERROR4F: Comuníquese con el administrador del sistema.");
		return $objResponse;
	}
	
?>