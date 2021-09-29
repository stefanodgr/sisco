<?php
	$rutaDir = "../../";
	include_once $rutaDir.'config.php';

    $ctrlAcceso = validarConexion();

	if($ctrlAcceso){
        $TBS = new clsTinyButStrong;

        isset($_GET['case'])    ? $case     = $_GET['case']     : $case     = null;

        $perfilUsuario = $_SESSION['PerfilUsuario'];

        switch($case){
            case 0:// Este caso No afecta la Pantalla 
                $vista = $rutaDir.'vista/referencial/extintor.tpl';
                $TBS->LoadTemplate($vista);	
            break;
            case 1:	
                isset($_GET['estado']) ? $estado = $_GET['estado'] : $estado = null;

                if($estado == 'inicial'){
                    unset($estado);
                    $titulo = 'Tablas Referenciales:Extintores';
                    $rutaReferencial = 'controlador/referencial/extintor.php?case='.$case;
                    $vista = $rutaDir.'vista/referencial/extintor.tpl';
                    $TBS->LoadTemplate($vista);
                }
                else{
                    $descTabla 		= 'Listado de Extintor';
                    $nombreTabla	= "extintor";
                    $idTabla 		= "extintor_id";	
                    $siglas 		= 'lext';
                    $tipoCampoPk	= 'serial';	
                    $encabezado		= array('Numero','Estatus','Motivo');
                    $columna 		= array('extintor_num','extintor_status','extintor_motivo');
                    $tipo 			= array('text','select','text');
                    $formato 		= array('num','','alpha');
                    $ctrlFuncion	= true;	
                    $ctrlBtnTipo 	= "E";

                    $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna,$tipo,$formato);

                    	// SELECT POR CONSULTA A LA BD		-----------PLANO STATUS
				
				$opc1['id'] 	= '0';
				$opc1['valor'] 	= 'Desactivado';
				$opc2['id'] 	= '1';
				$opc2['valor'] 	= 'Activado';

				$select_extintor_status['columna'] 		= 'extintor_status';			// IMPORTANTE: EL CAMPO COLUMNA CONTIENE EL NOMBRE DE LA COLUMNA BD A LA QUE SERA ASOCIADA EL SELECT AL MOMENTO DE EDITAR
				$select_extintor_status['editable'] 	= false;				// PERMITE CONTROLAR SI AL SELECT SE LE PODRÁN AREGAR NUEVAS OPCIONES O NO. OPCIONES: <true> : <false>
				$select_extintor_status['opcion'][0] 	= $opc1;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.
				$select_extintor_status['opcion'][1] 	= $opc2;				// GUARDAR EN ESTA POSICIÓN EL ARREGLO DE OPCIONES DEFINIDO DE FORMA MANUAL O AUTOMÁTICA MEDIANTE CONSULTA A LA BD.

				$select = array($select_extintor_status);

                    $opcDtbPag 		= true;				
                    $opcDtbPagTyp 	= 'full_numbers';
                    $opcDtbFil 		= true;				
                    $opcDtbCanFil 	= 10;


                    $rutaJson 	= $rutaDir.'json/extintor.php?case=0';
                    $vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

                    $TBS -> LoadTemplate($vista);
                    $TBS -> MergeBlock('dtsTbl',$dtsTbl);
                    $TBS -> MergeBlock('select',$select);
                }
            break;
            case 2: // FICHA DE EXTINTORES
				 isset($_GET['modulo']) ? $modulo = $_GET['modulo'] : $modulo = null;

                if($modulo == 'estructura'){
					echo "llego->estructura";
                }
                if($modulo == 'extintor'){
                    $ctrlEstAct = 'oculto';
                    $ctrlPabx   = 'oculto';
                    $ctrlLogin  = '';
                    $ctrlSede   = 'oculto';
                    $ctrlPerfil = '';
                }
            
                // $perfil = new Perfil();
                // $arreglo = $perfil->consultar();
                // unset($perfil);

                // $j=1;
                // $perfil[0]['id'] 		= 0;		
                // $perfil[0]['codigo'] 	= '- Seleccione -';
                
                // foreach ($arreglo as $fila){
                //     $perfil[$j]['id'] 		= $fila->getAtributo("perfil_id");		
                //     $perfil[$j]['codigo'] 	= utf8_encode($fila->getAtributo("perfil_desc"));
                //     $j++;
                // }
				// unset($arreglo);

				$vista 	= $rutaDir.'vista/referencial/ficha_extintor.tpl';
				$TBS -> LoadTemplate($vista);

                // $TBS -> MergeBlock('perfil',$perfil);
            break;
        }
        $TBS->Show();
    }
?>