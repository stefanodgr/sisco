<?php
	class Parroquia extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "parroquia";
			$atributos['parroquia_id']['esPk']    	= true;
			$atributos['parroquia_cod']['esPk']  	= false;
			$atributos['parroquia_desc']['esPk'] 	= false;
			$objetos['Municipio']['id']       			= "municipio_id";
			$this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
		}
}
?>