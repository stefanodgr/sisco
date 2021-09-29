<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // LISTA DE Sector
            $sector  = new SectPatio();
            $arreglo  = $sector->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("sector_patio_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("sector_patio_desc");
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(2,'json');
     break;
    //  case 1:
    //  $patio  = new Patio();
    //  $arreglo  = $patio->consultar();

    //  if(count($arreglo)>0){
    //      foreach ($arreglo as $i=>$dato){
    //          $contenido['id'] 	= $dato->getAtributo("patio_id");
    //          $contenido[0]		= ++$i;
    //          $contenido[1]		= $dato->getAtributo("patio_desc");
    //         //  $contenido[2]		= (utf8_encode(trim($dato->getObjeto("Proyecto")->getAtributo("tipo_plano_desc"))));
    //          $data[]             = $contenido;
    //      }
    //  }
    //  // else $data = 0;
    //  else $data = cargarFilaVacia(2,'json');

    //  break;
    }
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>