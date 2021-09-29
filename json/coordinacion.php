<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

     switch($case){
         case 0: // LISTA DE Sector
            $coordinacion  = new Coordinacion();
            $arreglo  = $coordinacion->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("coordinacion_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("coordinacion_desc");
                    $contenido[2]		= (utf8_encode(trim($dato->getObjeto("Zona")->getAtributo("zona_desc"))));
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
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