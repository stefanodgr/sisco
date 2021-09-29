<?php
    $rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;
    isset($_GET['idInfraccion']) 	? $idInfraccion = $_GET['idInfraccion'] : $idInfraccion = null;

    switch($case){
        case 0: // LISTADO DE PERSONAL O INDIVIDUO
        isset($_GET['tipo'])    ? $tipo     = $_GET['tipo']     : $tipo     = null;
        isset($_GET['filtros']) ? $filtros  = $_GET['filtros']  : $filtros  = null;
        
            $personal  = new Personal();
            $arreglo  = $personal->consultar();

            if(count($arreglo)>0){
                foreach ($arreglo as $i=>$dato){
        $contenido['id'] 	= $dato->getAtributo("pers_id");
        $contenido[0]		= ++$i;
        $contenido[1]		= $dato->getAtributo("pers_cedula");
        $contenido[2]		= $dato->getAtributo("pers_nombre");
        $contenido[3]		= $dato->getAtributo("pers_telf");
        $contenido[4]		= $dato->getAtributo("pers_correo");
        $contenido[5]		= (utf8_encode(trim($dato->getObjeto("CetroVotacion")->getObjeto("Parroquia")->getObjeto("Municipio")->getObjeto("Estado")->getAtributo("estado_desc"))));
        $contenido[6]		= (utf8_encode(trim($dato->getObjeto("CetroVotacion")->getObjeto("Parroquia")->getObjeto("Municipio")->getAtributo("municipio_desc"))));
        $contenido[7]		= (utf8_encode(trim($dato->getObjeto("CetroVotacion")->getObjeto("Parroquia")->getAtributo("parroquia_desc"))));
        $contenido[8]		= (utf8_encode(trim($dato->getObjeto("CetroVotacion")->getAtributo("cv_desc"))));
        $contenido[9]		= (utf8_encode(trim($dato->getObjeto("Electoral")->getAtributo("electoral_desc"))));
        $contenido[10]		= (utf8_encode(trim($dato->getObjeto("Postulacion")->getAtributo("postu_desc"))));
        $contenido[11]		= (utf8_encode(trim($dato->getObjeto("Militancia")->getAtributo("militancia_desc"))));


                    $data[]             = $contenido;
                }
            }
            else $data = 0;
            // else $data = cargarFilaVacia(8,'json');
        break;
    }
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>
