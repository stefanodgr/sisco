<?php
	$rutaDir = '../';
    include_once $rutaDir.'config.php';

    isset($_GET['case']) ? $case = $_GET['case'] : $case = null;
    isset($_GET['id'])  ? $id  = $_GET['id']  : $id  = null;

    switch($case){

        case 0:
            // Usuario //
            $objeto     = new Usuario();
            $arrUsu    = $objeto->listaUsuario();

            if(count($arrUsu)>0){
                foreach ($arrUsu as $i=>$dato){
                    $contenido['id'] 	= $dato["id"];
                    $contenido[0]		= ++$i;
                    $contenido[1]		= $dato["login"];
                    $contenido[2]		= $dato["usu"];
                    $contenido[3]		= $dato["perfil"];
                    $contenido[4]		= (utf8_encode(trim($dato["status"]))==t) ? "Activo":"Inactivo";
                    $data[]         = $contenido;
                }
            }
        // else $data = 0;
        else $data = cargarFilaVacia(5,'json');
    break;
}
    
	$arrJson[data] = $data;
    // echo("<pre>");
    // print_r($arrJson);
    // echo("</pre>");
    $json = json_encode($arrJson);
    echo($json);
?>