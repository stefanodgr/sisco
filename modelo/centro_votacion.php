<?php
	class CetroVotacion extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "centro_votacion";
			$atributos['cv_id']['esPk']    	= true;
			$atributos['cv_desc']['esPk'] 	= false;
			$objetos['Parroquia']['id']     = "parroquia_id";
			$this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
		}
}
?>