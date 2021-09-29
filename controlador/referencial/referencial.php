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
                $titulo = 'Datos Generales: Referencial';

                $vista = $rutaDir.'vista/referencial/referencial.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Datos Generales:Sector';
                    $rutaReferencial = 'controlador/referencial/referencial.php?case='.$case;
                    $vista = $rutaDir.'vista/referencial/sector_patio.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Sectores';
                    $nombreTabla	= "sector_patio";
                    $idTabla 		= "sector_patio_id";	
                    $siglas 		= 'lsect';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Nombre');
                    $columna 		= array('sector_patio_desc');
                    $tipo 			= array('text');
                    $formato 		= array('alphanum');
                    $ctrlFuncion	= true;	
                    $ctrlBtnTipo 	= "A";

                    $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

                    // if($perfilUsuario == 'SISTEMAS') $visible = array('','','','','','','');
                    // else $visible = array('','','','','false','false','false');
                   
                    // $ctrlFuncion	= true;
                    // $ctrlBtnTipo 	= 'E';
                    // $opcDtbInf 		= false;
                    
                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;


                    $rutaJson 	= $rutaDir.'json/referencial.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                }
            break;
        //     case 1:	//LISTA DE PLANOS
        //     isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

        //     if($estado == 'inicial'){
        //         unset($estado);
        //         $titulo = 'Datos Generales:Patio';
        //         $rutaReferencial = 'controlador/referencial/referencial.php?case='.$case;
        //         $vista = $rutaDir.'vista/referencial/patio.tpl';
        //         $TBS->LoadTemplate($vista);
        //     }
        //     else{
        //         $titulo = 'Lista de Planos';

        //         $descTabla 		= 'Listado de Patios ';
        //         $nombreTabla	= "patio";
        //         $idTabla 		= "patio_id";	
        //         $siglas 		= 'lpat';
        //         $tipoCampoPk	= 'serial';	
        //         $encabezado		= array('Nombre',);
        //         $columna 		= array('patio_desc');
        //         $tipo 			= array('text');
        //         $formato 		= array('alphanum');
        //         $ctrlFuncion	= true;	
        //         $ctrlBtnTipo 	= "A";
                
        //         $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

        //         $opcDtbPag 		= true;				
        //         $opcDtbPagTyp 	= 'full_numbers';
        //         $opcDtbFil 		= true;				
        //         $opcDtbCanFil 	= 10;

        //         $rutaJson 	= $rutaDir.'json/referencial.php?case=1';
        //         $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

        //         $TBS-> LoadTemplate($vista);
        //         $TBS->MergeBlock('dtsTbl',$dtsTbl);
        //         // $TBS->MergeBlock('select',$select);
        //     }
        // break;
        }
        $TBS->Show();
    }
?>