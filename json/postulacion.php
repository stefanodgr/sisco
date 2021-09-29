<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // LISTA DE Postulacion
            $postu  = new Postulacion();
            $arreglo  = $postu->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("postu_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("postu_desc");
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(2,'json');
     break;
    }
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>