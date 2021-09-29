<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // ESTADOS
            $estado  = new Estado();
            $arreglo  = $estado->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("estado_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("estado_cod");
                    $contenido[2]		= $dato->getAtributo("estado_desc");
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(3,'json');
        break;
        case 1:
            // MUNICIPIO //
            isset($_GET['estId']) ? $estId = $_GET['estId'] : $estId = null;

            $objeto     = new Municipio();
            $objeto->setObjeto('Estado',$estId);
            $arreglo    = $objeto->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id']= $dato->getAtributo('municipio_id');
                    $contenido[0]	= ++$i;
                    $contenido[1]   = $dato->getAtributo('municipio_cod');
                    $contenido[2]   = $dato->getAtributo('municipio_desc');
                    $data[]         = $contenido;
                }
            }
            else $data = cargarFilaVacia(3,'json');
        break;
    }
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>