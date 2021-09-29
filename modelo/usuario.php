<?php
	class Usuario extends ClaseBd {
		function declararTabla() {
			$tabla                           		= "usuario";
			$atributos['usuario_id']['esPk']    	= true;
			$atributos['usuario_login']['esPk']  	= false;
			$atributos['usuario_clave']['esPk']  	= false;
			$atributos['usuario_activo']['esPk']  	= false;
			$atributos['usuario_nombre']['esPk']  	= false;

			$this->registrarTabla($tabla, $atributos, $objetos, $strOrderBy);
		}
	    function listaUsuario(){
			$ctrlWhere = false;
				
							$strSelect  = "		A.usuario_id AS id,
							A.usuario_login AS login,
							A.usuario_nombre AS usu,
							A.usuario_activo AS status,
							D.perfil_desc AS perfil,
							max(E.conexion_fecha_ini )AS fecha_ent";
							$strFrom    = "usuario AS A 
							LEFT JOIN rel_perfil_usuario 	AS C ON C.usuario_id 	= A.usuario_id
							LEFT JOIN perfil 		AS D ON D.perfil_id 	= C.perfil_id
							LEFT JOIN conexion 		AS E ON E.rel_perfil_usuario_id = A.usuario_id";
							$strGroupBy = "	A.usuario_id,
											D.perfil_id,
											A.usuario_login,
											A.usuario_nombre,
											A.usuario_activo,
											D.perfil_desc";
							$strOrderBy = "id asc";
				
				
							$resultado = $this->miConexionBd->hacerSelect($strSelect,$strFrom,null,$strGroupBy,$strOrderBy,true);
				
							// $personal = new Personal();
							// foreach($resultado as $i => $fila){
							// 	$objeto 	= $personal->buscarPersonal($fila['pers_id']);
							// 	$nombre 	= explode(' ',$objeto[0]['nombre']);
							// 	$nombre 	= $nombre[0];
							// 	$apellido 	= explode(' ',$objeto[0]['apellido']);
							// 	$apellido 	= $apellido[0];
								
							// 	$resultado[$i]['nombre'] = $nombre.' '.$apellido;
							// 	$resultado[$i]['cargo'] = $objeto[0]['cargo'];
							//     unset($objeto);
							// }
							return $resultado;
						}
					/**
						* consulta de accesos de usuarios logueados
						* si no estan logueados no muestra los formularios (sesiones)
						*/
						
						function totalConsultar() {
							$miConexionBd = new ConexionBd();
							$datos = $this->getDatos();
							$strWhere = "1=1";
							foreach ($datos as $campo=>$valor) {
								if (comprobarVar($valor)) {
									$strWhere .= " AND $campo = '".strMayus($valor)."'";
								}
							}
							$resultado = $miConexionBd->hacerSelect("COUNT(*) AS cantidad",
							"usuario",$strWhere);
							return comprobarVar($resultado[0]['cantidad']) ?
							intval($resultado[0]['cantidad']) : 0;
						}
					}
?>