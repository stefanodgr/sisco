<?php
	class Militancia extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "militancia";
			$atributos['militancia_id']['esPk']    	= true;
			$atributos['militancia_desc']['esPk'] 	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>