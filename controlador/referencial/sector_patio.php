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

                $vista = $rutaDir.'vista/referencial/sector_patio.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Datos Generales:Sector';
                    $rutaReferencial = 'controlador/referencial/sector_patio.php?case='.$case;
                    $vista = $rutaDir.'vista/referencial/sector_patio.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Sectores';
                    $nombreTabla	= "sector_patio";
                    $idTabla 		= "sector_patio_id";	
                    $siglas 		= 'lsect';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Nombre','Status');
                    $columna 		= array('sector_patio_desc','sector_patio_status');
                    $tipo 			= array('text','select');
                    $formato 		= array('alphanum','');
                    $ctrlFuncion	= true;	
                    $ctrlBtnTipo 	= "A";

                    $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);


                    	// SELECT POR CONSULTA A LA BD		-----------PLANO STATUS
				
                        $opc1['id'] 	= '0';
                        $opc1['valor'] 	= 'Desactivado';
                        $opc2['id'] 	= '1';
                        $opc2['valor'] 	= 'Activado';
        
                        $select_sector_patio_status['columna'] 		= 'sector_patio_status';			// IMPORTANTE: EL CAMPO COLUMNA CONTIENE EL NOMBRE DE LA COLUMNA BD A LA QUE SERA ASOCIADA EL SELECT AL MOMENTO DE EDITAR
                        $select_sector_patio_status['editable'] 	= false;				// PERMITE CONTROLAR SI AL SELECT SE LE PODRÁN AREGAR NUEVAS OPCIONES O NO. OPCIONES: <true> : <false>
                        $select_sector_patio_status['opcion'][0] 	= $opc1;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.
                        $select_sector_patio_status['opcion'][1] 	= $opc2;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.
        
                        $select = array($select_sector_patio_status);
                    
                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;


                    $rutaJson 	= $rutaDir.'json/sector_patio.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                    $TBS -> MergeBlock('select',$select);
                }
            break;
        }
        $TBS->Show();
    }
?>