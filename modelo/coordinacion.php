<?php
	class Coordinacion extends ClaseBd{
		function declararTabla() {
			$tabla                           	        = "coordinacion";
			$atributos['coordinacion_id']['esPk']    	= true;
			$atributos['coordinacion_desc']['esPk']  	= false;
            $objetos['Zona']['id']       	            = "zona_id";
            $strOrderBy 								= "coordinacion_id";
			$this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
		}
}
?>