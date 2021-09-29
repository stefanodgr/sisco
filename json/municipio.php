<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // Municipio
            $municipio  = new Municipio();
            $arreglo  = $municipio->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("municipio_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("municipio_cod");
                    $contenido[2]		= $dato->getAtributo("municipio_desc");
                    $contenido[3]		= (utf8_encode(trim($dato->getObjeto("Estado")->getAtributo("estado_desc"))));
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(4,'json');
        break;
        case 1:
            // Parroquia //
            isset($_GET['munId']) ? $munId = $_GET['munId'] : $munId = null;

            $objeto     = new Parroquia();
            $objeto->setObjeto('Municipio',$munId);
            $arreglo    = $objeto->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id']= $dato->getAtributo('parroquia_id');
                    $contenido[0]	= ++$i;
                    $contenido[1]   = $dato->getAtributo('parroquia_cod');
                    $contenido[2]   = $dato->getAtributo('parroquia_desc');
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