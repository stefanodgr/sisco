<?php
	class Personal extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "personal";
			$atributos['pers_id']['esPk']    	= true;
			$atributos['pers_cedula']['esPk']  	= false;
            $atributos['pers_nombre']['esPk'] 	= false;
            $atributos['pers_telf']['esPk']  	= false;
            $atributos['pers_correo']['esPk'] 	= false;
            $objetos['CetroVotacion']['id']       	    = "cv_id";
            $objetos['Electoral']['id']       			= "electoral_id";
            $objetos['Militancia']['id']       			= "militancia_id";
            $objetos['Postulacion']['id']       	    = "postu_id";
            $this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
            // file_put_contents(RUTA_SISTEMA."log/personal.txt", $atributos);
        }
}
?>