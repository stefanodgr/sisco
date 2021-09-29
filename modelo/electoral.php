<?php
	class Electoral extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "electoral";
			$atributos['electoral_id']['esPk']    	= true;
			$atributos['electoral_desc']['esPk'] 	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>