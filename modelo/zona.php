<?php
	class Zona extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "zona";
			$atributos['zona_id']['esPk']    	= true;
			$atributos['zona_desc']['esPk']  	= false;
			$atributos['zona_status']['esPk']  	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>