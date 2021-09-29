<?php
	$rutaDir = "../../";
	include_once $rutaDir.'config.php';

	$ctrlAcceso = validarConexion();
	if($ctrlAcceso){
        $TBS = new clsTinyButStrong;

        isset($_GET['case'])    ? $case     = $_GET['case']     : $case     = null;
		isset($_GET['estId'])   ? $estId    = $_GET['estId']    : $estId    = null; 

        $perfilUsuario = $_SESSION['PerfilUsuario'];
   
        switch($case){
            case 0:
                $titulo = 'Datos Generales: Usuario';

                $vista = $rutaDir.'vista/usuario/usuario.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Datos Generales:Usuario';
                    $rutaReferencial = 'controlador/usuario/usuario.php?case='.$case;
                    $vista = $rutaDir.'vista/usuario/usuario.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Usuarios';
                    $siglas 		= 'usu';
					$encabezado		= array('Login','Nombre','Perfil','Status');

                    if($perfilUsuario == 'SISTEMAS') $visible = array('','','','','','','');
                    else $visible = array('','','','','false','false','false');
                   
                    $ctrlFuncion	= true;
                    $ctrlBtnTipo 	= 'E';
                    $opcDtbInf 		= false;
                    
                    $dtsTbl 		= crearDtsTbl($siglas,$encabezado,null,null,null,null,null,null);
                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;
                    $rutaJson 	= $rutaDir.'json/usuario.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                }
            break;
			case 2: // FICHA DE PERSONAL
				 isset($_GET['modulo']) ? $modulo = $_GET['modulo'] : $modulo = null;

                if($modulo == 'estructura'){
					echo "llego->estructura";
                }
                if($modulo == 'usuario'){
                    $ctrlEstAct = '';
                    $ctrlPabx   = '';
                    $ctrlLogin  = '';
                    $ctrlSede   = '';
                    $ctrlPerfil = '';
                }

                $perfil = new Perfil();
                $arreglo = $perfil->consultar();
                unset($perfil);

                $j=1;
                $perfil[0]['id'] 		= 0;		
                $perfil[0]['codigo'] 	= '- Seleccione -';
                
                foreach ($arreglo as $fila){
                    $perfil[$j]['id'] 		= $fila->getAtributo("perfil_id");		
                    $perfil[$j]['codigo'] 	= utf8_encode($fila->getAtributo("perfil_desc"));
                    $j++;
                }
				unset($arreglo);

				$vista 	= $rutaDir.'vista/usuario/ficha_usuario.tpl';
				$TBS -> LoadTemplate($vista);

                $TBS -> MergeBlock('perfil',$perfil);
            break;
        }
        $TBS->Show();
    }
?>