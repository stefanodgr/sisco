<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // Parroquia
            $parroquia  = new Parroquia();
            $arreglo  = $parroquia->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("parroquia_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("parroquia_cod");
                    $contenido[2]		= $dato->getAtributo("parroquia_desc");
                    $contenido[3]		= (utf8_encode(trim($dato->getObjeto("Municipio")->getAtributo("municipio_desc"))));
                    $contenido[4]		= (utf8_encode(trim($dato->getObjeto("Municipio")->getObjeto("Estado")->getAtributo("estado_desc"))));
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(5,'json');
        break;
        case 1:
            // Centro Votacion //
            isset($_GET['parroId']) ? $parroId = $_GET['parroId'] : $parroId = null;

            $objeto     = new CetroVotacion();
            $objeto->setObjeto('Parroquia',$parroId);
            $arreglo    = $objeto->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id']= $dato->getAtributo('cv_id');
                    $contenido[0]	= ++$i;
                    $contenido[1]   = $dato->getAtributo('cv_desc');
                    $data[]         = $contenido;
                }
            }
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