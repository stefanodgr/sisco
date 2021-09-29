<?php
	class Extintor extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "extintor";
			$atributos['extintor_id']['esPk']    	= true;
			$atributos['extintor_num']['esPk']  	= false;
			$atributos['extintor_status']['esPk']  	= false;
			$atributos['extintor_motivo']['esPk']  	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>