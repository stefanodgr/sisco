<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;

    switch($case){
        case 0: // LISTA DE Sector
            $extintor  = new Extintor();
            $arreglo  = $extintor->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
                    $contenido['id'] 	= $dato->getAtributo("extintor_id");
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato->getAtributo("extintor_num");
                    $contenido[2]		= (utf8_encode(trim($dato->getAtributo("extintor_status")))==1) ? "Activo":"Inactivo";
                    $contenido[3]		= (utf8_encode(trim($dato->getAtributo("extintor_motivo"))));
                    $data[]             = $contenido;
                }
            }
            // else $data = 0;
            else $data = cargarFilaVacia(4,'json');
     break;
   }
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>