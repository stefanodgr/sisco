<?php
	class Estado extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "estado";
			$atributos['estado_id']['esPk']    	= true;
			$atributos['estado_cod']['esPk']  	= false;
			$atributos['estado_desc']['esPk'] 	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>