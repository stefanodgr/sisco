<?php
	$rutaDir = "../../";
	include_once $rutaDir.'config.php';

    $ctrlAcceso = validarConexion();

	if($ctrlAcceso){
        $TBS = new clsTinyButStrong;

        isset($_GET['case'])    ? $case     = $_GET['case']     : $case     = null;

        $perfilUsuario = $_SESSION['PerfilUsuario'];

   
        switch($case){
            case 0:

            //----------------------SELECT ESTADO ----------------------//
            $estado = new Estado();
            $arreglo = $estado->consultar();
            unset($estado);
            // echo "--->".(count($arreglo));

            $j=1;
            $estado[0]['id'] 		= 0;		
            $estado[0]['codigo'] 	= '- Seleccione -';
            
            foreach ($arreglo as $fila){
                $estado[$j]['id'] 		= $fila->getAtributo("estado_id");		
                $estado[$j]['codigo'] 	= utf8_encode($fila->getAtributo("estado_desc"));
                $j++;
            }
            unset($arreglo);


            //------------------------------------------//
            //---------------------SELECT ELECTORAL-------------------------------------//
            $electoral = new Electoral();
            $arreglo = $electoral->consultar();
            unset($electoral);
            // echo "--->".(count($arreglo));

            $j=1;
            $electoral[0]['id'] 		= 0;		
            $electoral[0]['codigo'] 	= '- Seleccione -';
            
            foreach ($arreglo as $fila){
                $electoral[$j]['id'] 		= $fila->getAtributo("electoral_id");		
                $electoral[$j]['codigo'] 	= utf8_encode($fila->getAtributo("electoral_desc"));
                $j++;
            }
            unset($arreglo);

             //------------------SELECT MILITANTE--------------------------//
             $militancia = new Militancia();
             $arreglo = $militancia->consultar();
             unset($militancia);
             // echo "--->".(count($arreglo));
 
             $j=1;
             $militancia[0]['id'] 		= 0;		
             $militancia[0]['codigo'] 	= '- Seleccione -';
             
             foreach ($arreglo as $fila){
                 $militancia[$j]['id'] 		= $fila->getAtributo("militancia_id");		
                 $militancia[$j]['codigo'] 	= utf8_encode($fila->getAtributo("militancia_desc"));
                 $j++;
             }
             unset($arreglo);

                //-------------------------------------------------------------//
                 //------------------SELECT POSTULACION--------------------------//

                 $postulacion = new Postulacion();
                 $arreglo = $postulacion->consultar();
                 unset($postulacion);
                 // echo "--->".(count($arreglo));
     
                 $j=1;
                 $postulacion[0]['id'] 		= 0;		
                 $postulacion[0]['codigo'] 	= '- Seleccione -';
                 
                 foreach ($arreglo as $fila){
                     $postulacion[$j]['id'] 		= $fila->getAtributo("postu_id");		
                     $postulacion[$j]['codigo'] 	= utf8_encode($fila->getAtributo("postu_desc"));
                     $j++;
                 }
                 unset($arreglo);
    
                 //----------------------------------------------------------------//



                $vista = $rutaDir.'vista/personal/personal.tpl';
                $TBS->LoadTemplate($vista);	
                $TBS -> MergeBlock('estado',$estado);
                $TBS -> MergeBlock('electoral',$electoral);
                $TBS -> MergeBlock('militancia',$militancia);
                $TBS -> MergeBlock('postulacion',$postulacion);

            break;
            case 1:	

                isset($_GET['tipo']) 	? $tipo 	= $_GET['tipo'] 	: $tipo 	= null;
				isset($_GET['filtros']) ? $filtros 	= $_GET['filtros'] 	: $filtros 	= null;

                    $descTabla 		= 'Listado de Personal';
                    $nombreTabla	= "personal";
                    $idTabla 		= "pers_id";	
                    $siglas 		= 'lpers';
                    $tipoCampoPk	= 'serial';	
                    // $encabezado		= array('Cedula','Nombre','telefono','Correo','Estado','Municipio','Parroquia','Centro Votacion','Electoral','Postulacion','Militancia');!
$encabezado		= array('Cedula','Nombre','Telefono','Correo','Estado','Municipio','Parroquia','CentroVo','Electoral','Militancia','Postulacion');
$columna 		= array('pers_cedula','pers_nombre','pers_telf','pers_correo','estado_desc','municipio_desc','parroquia_desc','cv_desc','electoral_desc','militancia_desc','postu_desc');
// $columna 		'parroquia_desc','cv_desc','electoral_desc','postu_desc','militancia_desc');
                    // $tipo 			= array('text','text','text','text','text','text','text');
                    // $formato 		= array('alphanum','alphanum','alphanum','alphanum','alphanum','alphanum','alphanum');
                    // $ctrlFuncion	= true;	
                    // $ctrlBtnTipo 	= "E";

                    if($_SESSION['PerfilUsuario'] == 'CONSULTA'){
                        $ctrlFuncion= false;
                        $opcDtbInf 	= true;
                    }
                    else{
                        $ctrlFuncion	= true;
                        $ctrlBtnTipo 	= 'E';
                        $opcDtbInf 		= false;
                    }

                $dtsTbl 		= crearDtsTbl($siglas,$encabezado,$columna);
                $opcDtbPag 		= true;				
				$opcDtbPagTyp 	= 'full_numbers';
				$opcDtbFil 		= true;				
				$opcDtbCanFil 	= 10;

				switch($tipo){
					case 'inicial':
						$rutaJson 	= $rutaDir.'json/personal.php?case=0&tipo='.$tipo;
					break;
					case 'filtros':
						$rutaJson 	= $rutaDir.'json/personal.php?case=0&tipo='.$tipo.'&filtros='.$filtros;
					break;
                }
                

       

				$vista 		= $rutaDir.'libreria/hg/hg_dtb_json.tpl';

				$TBS -> LoadTemplate($vista);
                $TBS -> MergeBlock('dtsTbl',$dtsTbl);
           
                
            break;
            }
        }
    
        $TBS->Show();
?>