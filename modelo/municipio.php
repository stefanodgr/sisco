<?php
	class Municipio extends ClaseBd{
		function declararTabla() {
			$tabla                           		= "municipio";
			$atributos['municipio_id']['esPk']    	= true;
			$atributos['municipio_cod']['esPk']  	= false;
			$atributos['municipio_desc']['esPk'] 	= false;
			$objetos['Estado']['id']       			= "estado_id";
			$this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
		}
}
?>