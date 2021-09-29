<?php
	$rutaDir = "../../";
	include_once $rutaDir.'config.php';

    $ctrlAcceso = validarConexion();

	if($ctrlAcceso){
        $TBS = new clsTinyButStrong;

        isset($_GET['case'])    ? $case     = $_GET['case']     : $case     = null;

        $perfilUsuario = $_SESSION['PerfilUsuario'];

        switch($case){

            case 0: // Este caso No afecta la Pantalla 
                $vista = $rutaDir.'vista/referencial/coordinacion.tpl';
                $TBS->LoadTemplate($vista);	
            break;
             case 1:
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Tablas Referenciales: Coordinaciones';
                    $rutaReferencial = 'controlador/referencial/coordinacion.php?case='.$case;
                    $vista = $rutaDir.'vista/referencial/coordinacion.tpl';
                    $TBS->LoadTemplate($vista);
                }else{
                    $descTabla 		= 'Listado de Coordinaciones';
                    $nombreTabla	= "coordinacion";
                    $idTabla 		= "coordinacion_id";	
                    $siglas 		= 'lcoord';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Nombre','Zona');
                    $columna 		= array('coordinacion_desc','zona_id');
                    $tipo 			= array('text','select');
                    $formato 		= array('alphanum','');
                    $ctrlFuncion	= true;	
                    $ctrlBtnTipo 	= "A";

                    $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

                    // SELECT POR CONSULTA A LA BD		-----------Zona 
				$miZona = new Zona();
				$arrZona = $miZona->consultar();

				foreach ($arrZona as $i=>$unDato){
					$zona['id'] 		= utf8_encode(trim($unDato->getAtributo("zona_id")));		// EL CAMPO ID CONTIENE EL VALOR QUE SE GUARDARÁ EN LA BD
					$zona['valor'] 		= utf8_encode(trim($unDato->getAtributo("zona_desc")));		// EL CAMPO VALOR CONTIENE EL VALOR VISIBLE AL USUARIO EN EL DATATABLE

					$select_zona_id['columna'] 	= 'zona_id';		// IMPORTANTE: EL CAMPO COLUMNA CONTIENE EL NOMBRE DE LA COLUMNA BD A LA QUE SERA ASOCIADA EL SELECT AL MOMENTO DE EDITAR
					$select_zona_id['editable'] 	= false;				// PERMITE CONTROLAR SI AL SELECT SE LE PODRÁN AREGAR NUEVAS OPCIONES O NO. OPCIONES: <true> : <false>
					$select_zona_id['opcion'][] 	= $zona;			// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.
					unset($zona);
                }	
                
                $select = array($select_zona_id);

                    
                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;


                    $rutaJson 	= $rutaDir.'json/coordinacion.php?case=0';
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