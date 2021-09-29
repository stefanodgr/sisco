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
                $vista = $rutaDir.'vista/referencial/patio.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Datos Generales:Estado';
                    $rutaReferencial = 'controlador/estado/estado.php?case='.$case;
                    $vista = $rutaDir.'vista/estado/estado.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Estado';
                    $nombreTabla	= "estado";
                    $idTabla 		= "estado_id";	
                    $siglas 		= 'lest';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Codigo','Nombre');
                    $columna 		= array('estado_cod','estado_desc');
                    $tipo 			= array('text','text');
                    $formato 		= array('alphanum','alphanum');
                    $ctrlFuncion	= true;	
                    $ctrlBtnTipo 	= "A";

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


                    $rutaJson 	= $rutaDir.'json/estado.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                    // $TBS -> MergeBlock('select',$select);
                }
            break;
            case 2:
            // MUNICIPIO //
            $descTabla 		= 'Municipios';
            $nombreTabla	= "municipio";
            $idTabla        = 'municipio_id';
            $tipoCampoPk	= 'serial';
            $siglas 		= 'lmu';
            $encabezado		= array('Codigo','Descripción');
            $columna 	    = array('municipio_cod','municipio_desc');					
            $tipo 		    = array('text','text');
            $formato	    = array('num','alpha');
            $ctrlFuncion	= true;	
            $ctrlBtnTipo    = 'A';

            $cmpExtTbl 	= 'estado_id';
            $valExtTbl	= $estId;

            $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

            $opcDtbPag 		= true;				
            $opcDtbPagTyp 	= 'simple_numbers';
            $opcDtbFil 		= true;			
            $opcDtbInf 		= false;			
            $opcDtbCanFil 	= 10;
            $sWSearch 		= 100;
            
            $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';
            $rutaJson 	= $rutaDir.'json/estado.php?case=1&estId='.$estId;

            $TBS -> LoadTemplate($vista);
            $TBS -> MergeBlock('dtsTbl',$dtsTbl);
        break;
        }
        $TBS->Show();
    }
?>