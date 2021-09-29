<?php
	class SectPatio extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "sector_patio";
			$atributos['sector_patio_id']['esPk']    	= true;
			$atributos['sector_patio_desc']['esPk']  	= false;
			$atributos['sector_patio_status']['esPk']  	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>