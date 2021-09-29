<?php
	$rutaDir = "../../";
	include_once $rutaDir.'config.php';

    $ctrlAcceso = validarConexion();

	if($ctrlAcceso){
        $TBS = new clsTinyButStrong;

        isset($_GET['case'])    ? $case     = $_GET['case']     : $case     = null;
        isset($_GET['munId'])   ? $munId    = $_GET['munId']    : $munId    = null;

        $perfilUsuario = $_SESSION['PerfilUsuario'];
   
        switch($case){
            case 0:
                $vista = $rutaDir.'vista/referencial/patio.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Datos Generales:Municipio';
                    $rutaReferencial = 'controlador/municipio/municipio.php?case='.$case;
                    $vista = $rutaDir.'vista/municipio/municipio.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Municipio';
                    $nombreTabla	= "municipio";
                    $idTabla 		= "municipio_id";	
                    $siglas 		= 'lmu1';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Codigo','Nombre','Estado');
                    $columna 		= array('municipio_cod','municipio_desc','estado_desc');
                    $tipo 			= array('text','text','text');
                    $formato 		= array('num','alphanum','alphanum');
                    $ctrlFuncion	= true;	
                    

                $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);


				// $opc1['id'] 	= '0';
				// $opc1['valor'] 	= 'Desactivado';
				// $opc2['id'] 	= '1';
				// $opc2['valor'] 	= 'Activado';

				// $select_extintor_status['columna'] 		= 'patio_status';			// IMPORTANTE: EL CAMPO COLUMNA CONTIENE EL NOMBRE DE LA COLUMNA BD A LA QUE SERA ASOCIADA EL SELECT AL MOMENTO DE EDITAR
				// $select_extintor_status['editable'] 	= false;				// PERMITE CONTROLAR SI AL SELECT SE LE PODRÁN AREGAR NUEVAS OPCIONES O NO. OPCIONES: <true> : <false>
				// $select_extintor_status['opcion'][0] 	= $opc1;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.
				// $select_extintor_status['opcion'][1] 	= $opc2;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.

				// $select = array($select_extintor_status);

                    
                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;


                    $rutaJson 	= $rutaDir.'json/municipio.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                    // $TBS -> MergeBlock('select',$select);
                }
            break;
            case 2:
            // MUNICIPIO //
            $descTabla 		= 'Parroquia';
            $nombreTabla	= "parroquia";
            $idTabla        = 'parroquia_id';
            $tipoCampoPk	= 'serial';
            $siglas 		= 'lparro';
            $encabezado		= array('Codigo','Descripción');
            $columna 	    = array('parroquia_cod','parroquia_desc');					
            $tipo 		    = array('text','text');
            $formato	    = array('num','alphanum');
            $ctrlFuncion	= true;	
            $ctrlBtnTipo    = 'A';

            $cmpExtTbl 	= 'municipio_id';
            $valExtTbl	= $munId;

            $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

            $opcDtbPag 		= true;				
            $opcDtbPagTyp 	= 'simple_numbers';
            $opcDtbFil 		= true;			
            $opcDtbInf 		= false;			
            $opcDtbCanFil 	= 10;
            $sWSearch 		= 100;
            
            $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';
            $rutaJson 	= $rutaDir.'json/municipio.php?case=1&munId='.$munId;

            $TBS -> LoadTemplate($vista);
            $TBS -> MergeBlock('dtsTbl',$dtsTbl);
        break;
        }
        $TBS->Show();
    }
?>