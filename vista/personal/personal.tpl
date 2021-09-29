<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>

		<!-- -------------------------------- INCLUSIÓN DE ESTILOS -------------------------------- -->
		<script type='text/javascript'>
			function mostrarFicha(){
				if($('#panel_left').hasClass('toggle_activo')){
					$(this).removeClass('rotar');
					$('#panel_left').removeClass('toggle_activo');
					$("#panel_left").animate({
						// 'left': "0px"
					});
					var anchoActual = $("#panel_right").width();
					var anchoNvo = anchoActual - 285;
					$("#panel_right").animate({
						'width':anchoNvo,
						'left': "285px"
					});
				}
				else{
					$(this).addClass('rotar');
					$('#panel_left').addClass('toggle_activo');
					$("#panel_left").animate({
						// 'left': "-300px"
					});
					$("#panel_right").animate({
						'left': "0px",
						'width':"100%"
					});
				}
				
			}
			mostrarFicha();

			// function cargarEstado(){
			// 	var selectEstado= document.getElementById('comboEstado');//Se Arma todo el Select
			// 	opcId = selectEstado.options[selectEstado.selectedIndex].id;
			// 	xajax_llenarEstado(opcId);
			// }

		</script>
		<!-- -------------------------------------------------------------------------------------- -->
		
	</head>
	<body>
		<div class='contenedor'>
			<div class='titulo'>
				<div>[var.titulo;noerr;] :.</div>
                <div>
                    <input type='image' id='toggle_menu' src="multimedia/imagen/icono/menu.png" style="width:15px;height:15px;transition-duration: 0.5s;">
                </div>
			</div>
            <div class='contenido'>
				<div id='div_filtros' class=''>
					<div class='div-tbl'>
						<!-- <div class="div-tbl-fi" style='justify-content: center;'>
							<div class="div-tbl-co" style='width:90px;'>
								<input type="text" class='div-inp-trans' disabled value='Sede:'>
							</div>
							<div class="div-tbl-co" style='width:150px;'>
								<select id="selSede">
									<option value="0" selected>TODAS</option>
									<option value="[sede.id;block=option;noerr]">
										[sede.sigla;block=option;noerr]
									</option>
								</select>
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:60px;'>
								<input type="text" class='div-inp-trans' disabled value='Área:'>
							</div>
							<div class="div-tbl-co" style='width:280px;'>
								<select id="selArea">
									<option id='opc_lin_todas' value="0" selected>TODAS</option>
									<option value="[area.id;block=option;noerr]">
										[area.desc;block=option;noerr]
									</option>
								</select>
							</div>
						</div> -->
						<div class="div-tbl-fi" style='justify-content: center;'>
							<div class="div-tbl-co" style='width:90px;'>
								<input type="text" class='div-inp-trans' disabled value='Tipo:'>
							</div>
							<div class="div-tbl-co" style='width:150px;'>
								<select id="selTipo">
									<option value="0" selected>TODAS</option>
									<option value="1">LABORAL</option>
									<option value="2">PERSONAL</option>
								</select>
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						<div class="div-tbl-fi avanzado" style="height:20px;"></div>
						<div class="div-tbl-fi" style='height:45px;justify-content:center;top:-10px;'>
							<div class="div-tbl-co" style='width:600px;justify-content: center;'>
								<input type="button" id='btn_busq_visita' 	class='btn_hg btnAzul2' 								style='width:120px;' 					value='Consultar'>
								<input type="button" id='btn_rep_lista' 	class='btn_hg btnVioleta [var.ctrlReporteLista;noerr]' 	style='width:120px;margin-left:20px;' 	value='Reporte PDF'>
							</div>
						</div>
					</div>
				</div>
                <div id='div_visita' class=''>
                     <iframe id='ifr_visita' name='ifr_visita' src='controlador/personal/personal.php?case=1&tipo=inicial' scrolling='no'></iframe> 
                </div>
                <div id='ficha_visita' class='oculto'>
                    <div class='div-tbl'>
						<div class="div-tbl-fi" style="height:30px;">
							<div id='titulo_ficha_vis' class="modal_titulo div-tbl-co" style='width:100%;'>- Ficha de Personal -</div>
						</div>
						<div class="div-tbl-fi" style="height:15px;"></div>
						<div class="div-tbl-fi oculto" style='justify-content: center;'>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans' disabled value='Id Visita:'>
							</div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" id='filt_visita_id' class='div-inp-dis' disabled>
							</div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans' disabled value='Id Visitante:'>
							</div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" id='filt_vte_id' class='div-inp-dis' disabled>
							</div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans' disabled value='Id Personal:'>
							</div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" id='filt_pers_id' class='div-inp-dis' disabled>
							</div>
						</div>
						<div class="div-tbl-fi" style="height:30px;">
								<div id='titulo_ficha_vis' class="div-inp-trans" style='width:100%;'>- Datos Personales -</div>
							</div>
						<div class="div-tbl-fi" style='justify-content: center;height:10px;'></div>
						<div class="div-tbl-fi" style="margin-left:19px;width:350px;"> 	<!-- CÉDULA !-->
							<div class="div-tbl-co" style='margin-right:2px;width:110px;'>
								<input type="text" class='div-inp-trans' disabled value='Cédula:'>
							</div>
							<div class="div-tbl-co" style='width:50px;'>
								<select class="dsR170 frm_0" id="filt_nac" size="1" style='height:30px;font-weight: bold;' >
									<option value="V">V</option>
									<option value="E">E</option>
									<option value="P">P</option>
								</select> 
							</div>
							<div class="div-tbl-co" style='width:140px;'>
								<input type="text" id='filt_cedula' class='div-inp-ena frm_0' >
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						<div class="div-tbl-fi" style="margin-left:19px;width:350px;"> 	<!-- NOMBRE !-->
							<div class="div-tbl-co" style='width:110px;'>
								<input type="text" class='div-inp-trans'  value='Nombre:' disabled>
							</div>
							<div class="div-tbl-co" style='width:220px;'>
								<input type="text" id='filt_nombre' class='div-inp-ena frm_1' >
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						<div class="div-tbl-fi" style="margin-left:19px;width:350px;"> 	<!-- APELLIDO !-->
							<div class="div-tbl-co" style='width:110px;'>
								<input type="text" class='div-inp-trans' disabled value='Apellido:'>
							</div>
							<div class="div-tbl-co" style='width:220px;'>
								<input type="text" id='filt_apellido' class='div-inp-ena frm_1' >
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						<div class="div-tbl-fi" style='margin-left:19px;width:350px;'>	<!-- Telefono !-->
							<div class="div-tbl-co" style='width:110px;'>
								<input type="text" class='div-inp-trans' disabled value='Telefono:'>
							</div>
							<div class="div-tbl-co" style='margin-left:30px;width:190px;'>
								<select id="filt_tipo_telf" class='frm_2' >
									<option value="0" selected>Seleccione..</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0426">0426</option>
									<option value="0416">0416</option>
									<option value="0412">0412</option>
								</select>
							</div>
							<div class="div-tbl-co" style='width:140px;'>
								<input type="text" id='filt_telf' class='div-inp-ena frm_0' >
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						<div class="div-tbl-fi" style='margin-left:20px;width:340px;'>		<!-- CORREO -->
							<div class="div-tbl-co" style='width:110px;'>
								<input type="text" class='div-inp-trans' disabled value='Correo:'>
							</div>
							<div class="div-tbl-co" style='width:200px;'>
								<input type="text" id='filt_correo' class='div-inp-ena frm_0' >
							</div>
							<div class="div-tbl-co" style='width:20px;'></div>
						</div>
						
						<div class="div-tbl-fi fila_estado " style="margin-left:5px;width: 340px;">       <!--ESTADO-->
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans'  value='Estado:'>
							</div>
							<div class="div-tbl-co" style='margin-left:50px;width:340px;'>
								<select id='filt_estado' class='div-inp-ena' style='font-weight:normal !important;' onchange="xajax_buscarMunicipio(this.value)" >
									<option value='[estado.id;block=option;noerr;]'>[estado.codigo]</option>
								</select>
							</div>
						</div>
						<div class="div-tbl-fi fila_muni " style="width: 340px;">      <!-- Municipio-->
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans'  value='Municipio:'>
							</div>
							<div class="div-tbl-co" style='margin-left:25px;width:140px;'>
									<select value='0' id="comboMunicipio"  onchange="xajax_buscarParroquia(this.value)"></select>
							</div>
						</div>
						<div class="div-tbl-fi fila_parro " style="width: 340px;">      <!-- Parroquia-->
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans'  value='Parroquia:'>
							</div>
							<div class="div-tbl-co" style='margin-left:25px;width:140px;'>
									<select value='' id="comboParroquia"  onchange="xajax_buscarCentroVo(this.value)"></select>
							</div>
						</div>
						<div class="div-tbl-fi fila_vota " style="width: 340px;">      <!-- Centro Votacion-->
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:125px;'>
								<input type="text" class='div-inp-trans'  value='Centro Votacion'>
							</div>
							<div class="div-tbl-co" style='width:140px;'>
									<select value='' id="comboCentroVo"></select>
							</div>
						</div>
						<!-- <div class="div-tbl-co" style='width:200px;'>
								<div class="div-tbl-co" style='width:100px;'>
										<input type="text" class='div-inp-trans'  value='Municipio:'>
									</div>
						<select id="comboMunicipio">
						</select>
						</div> -->
						<div class="div-tbl-fi fila_electoral " style="width: 340px;">      <!-- ELECTORAL-->
								<div class="div-tbl-co" style='width:20px;'></div>
								<div class="div-tbl-co" style='width:100px;'>
									<input type="text" class='div-inp-trans'  value='Cargo:'>
								</div>
								<div class="div-tbl-co" style='left:12px;width:140px;'>
									<select id='filt_electoral' class='div-inp-ena' style='font-weight:normal !important;' >
										<option value='[electoral.id;block=option;noerr;]'>[electoral.codigo]</option>
									</select>
								</div>
						</div>
						<div class="div-tbl-fi fila_milita " style="width: 340px;">        <!-- MILITANCIA -->
							<div class="div-tbl-co" style='width:20px;'></div>
							<div class="div-tbl-co" style='width:100px;'>
								<input type="text" class='div-inp-trans'  value='Militancia:'>
							</div>
							<div class="div-tbl-co" style='left:12px;width:140px;'>
								<select id='filt_milita' class='div-inp-ena' style='font-weight:normal !important;' >
									<option value='[militancia.id;block=option;noerr;]'>[militancia.codigo]</option>
								</select>
							</div>
						</div>
						<div class="div-tbl-fi fila_postu " style="width: 340px;">          <!-- POSTULACION -->
								<div class="div-tbl-co" style='width:20px;'></div>
								<div class="div-tbl-co" style='width:100px;'>
									<input type="text" class='div-inp-trans'  value='Postulacion:'>
								</div>
								<div class="div-tbl-co" style='left:12px;width:140px;'>
									<select id='filt_postu' class='div-inp-ena' style='font-weight:normal !important;' >
										<option value='[postulacion.id;block=option;noerr;]'>[postulacion.codigo]</option>
									</select>
								</div>
						</div>
						<div class="div-tbl-fi" style="height:60px;justify-content: center;"> 			<!--BOTONERA !-->
							<div class="div-tbl-co" style='width:calc(100% - 40px);justify-content:center;border:1px solid #d8d8d8;border-radius:6px;'>
								<input type="button" id='btn_visita_sal' 		class='btn_hg btnRojo btn_visita_0 oculto' 								style='width:132px;margin-left:20px;'  	value='Procesar Salida'>
								<input type="button" id='btn_pers_ace' 			class='btn_hg btnVerde btn_visita_1  '				style='width:132px;margin-left:20px;'  	value='Procesar'>
								<input type="button" id='btn_visita_rep' 		class='btn_hg btnVioleta btn_visita_0 oculto' 							style='width:132px;margin-left:20px;'	value='Reporte PDF'>
								<input type="button" id='btn_pers_atr' 			class='btn_hg btnAzul3 btn_visita_0 ' 							style='width:132px;margin-left:20px;'  	value='Atrás'>
								<input type="button" id='btn_visita_lim' 		class='btn_hg btnCeleste btn_visita_1 oculto' 							style='width:132px;margin-left:30px;'  	value='Limpiar Ficha'>
								<input type="button" id='btn_pers_can' 		class='btn_hg btnRojo btn_visita_1 oculto' 								style='width:132px;margin-left:30px;'  	value='Cancelar'>
							</div>
						</div>
						<div class="div-tbl-fi" style="height:15px;"></div>
					</div> 
				</div>
				<div id='div_util_visita' class='oculto'></div>
				<div id='div_lista_pers' class='oculto'>
					<iframe id='ifr_lista_pers' name='ifr_lista_pers'></iframe>
				</div>
            </div>
			<div class='preview' style="visibility: hidden;">
				<input type="image" class='img-preview'>
			</div>
			<div class='conexion'></div>
		</div>    
	</body>
</html>