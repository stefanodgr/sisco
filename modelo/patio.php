<?php
	class Patio extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "patio";
			$atributos['patio_id']['esPk']    	= true;
			$atributos['patio_desc']['esPk']  	= false;
			$atributos['patio_status']['esPk']  	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
	}
?>