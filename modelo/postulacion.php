<?php
	class Postulacion extends ClaseBd{
		function declararTabla() {
			$tabla                           	= "postulacion";
			$atributos['postu_id']['esPk']    	= true;
			$atributos['postu_desc']['esPk']  	= false;
			$this->registrarTabla($tabla, $atributos, null, $strOrderBy);
		}
}
?>