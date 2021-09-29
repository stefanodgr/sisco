<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
	</head>
	<body>
        <div id='ficha_usuario' class=''>
            <div class='div-tbl'>
                <div class="div-tbl-fi" style="height: 30px;">
                    <div id='titulo_ficha_usu' class="modal_titulo div-tbl-co" title="MATOS" style='width:620px;'>- Registrar de Usuario -</div>
                </div>
                <div class="div-tbl-fi" style="height: 10px;"></div>
                <div class="div-tbl-fi oculto" style="width: 100%;">
                    <div class="div-tbl-co" style='width:20px;'></div>	
                    <div class="div-tbl-co" style='width:110px;'>
                        <input type="text" class='div-inp-trans' disabled value='Id. Pers:'>
                    </div>
                    <div class="div-tbl-co" style='width:60px;'>
                        <input type="text" id='ficha_pers_id' class='div-inp-dis' disabled>
                    </div>
                    <div class="div-tbl-co" style='width:20px;'></div>
                    <div class="div-tbl-co" style='width:110px;'>
                        <input type="text" class='div-inp-trans' disabled value='Id. RelPersEst:'>
                    </div>
                    <div class="div-tbl-co" style='width:60px;'>
                        <input type="text" id='ficha_pers_rel_est_id' class='div-inp-dis' disabled>
                    </div>
                    <div class="div-tbl-co" style='width:20px;'></div>
                    <div class="div-tbl-co" style='width:110px;'>
                        <input type="text" class='div-inp-trans' disabled value='Id. UsuEst:'>
                    </div>
                    <div class="div-tbl-co" style='width:60px; border:1px solid red'>
                        <input type="text" id='ficha_pers_usu_id' class='div-inp-dis'>
                    </div>
                </div>
                <div class="div-tbl-fi" style="width: 340px;">
                    <div class="div-tbl-co" style='width:20px;'></div>	
                    <div class="div-tbl-co" style='width:100px;'>
                        <input type="text" class='div-inp-trans' disabled value='Nombre:'>
                    </div>
                    <div class="div-tbl-co" style='width:220px;' title="">
                        <input type="text" id='ficha_usu_nombre' class='div-inp-dis' title="" >
                    </div>
                </div>
                <div class="div-tbl-fi fila_login  [var.ctrlLogin;noerr]" style="width: 340px;">
                    <div class="div-tbl-co" style='width:20px;'></div>
                    <div class="div-tbl-co" style='width:100px;'>
                        <input type="text" class='div-inp-trans' disabled value='Login:'>
                    </div>
                    <div class="div-tbl-co" style='width:140px;'>
                        <input type="text" id='ficha_usu_login' class='div-inp-dis' >
                    </div>
                </div>
                <div class="div-tbl-fi fila_perfil " style="width: 340px;">
                    <div class="div-tbl-co" style='width:20px;'></div>
                    <div class="div-tbl-co" style='width:100px;'>
                        <input type="text" class='div-inp-trans'  value='Perfil:'>
                    </div>
                    <div class="div-tbl-co" style='width:140px;'>
                        <select id='ficha_usu_perfil' class='div-inp-dis' style='font-weight:normal !important;' >
                            <option value='[perfil.id;block=option;noerr;]'>[perfil.codigo]</option>
                        </select>
                    </div>
                </div>
                
                <div class="div-tbl-fi" style="width: 20px;height:30px;"></div>
                <div class="div-tbl-fi" style="width:100%;height:60px;border: 0px solid red;">
                    <div class="div-tbl-co" style='width:calc(100% - 40px);left:20px;justify-content:center;'>
                        <input type="button" id='ficha_usu_btn_atr' class='btn_hg btnAzul3 ficha_usu_btn_0' 	title="Atras"		style='width:132px;margin-left:30px;' 	value='Atrás'>
                        <input type="button" id='ficha_usu_btn_ace' class='btn_hg btnVerde ficha_usu_btn_1 ' 	title="Guardar" style='width:132px;cursor:pointer;' 	value='Aceptar' >
                        <input type="button" id='ficha_usu_btn_can' class='btn_hg btnRojo ficha_usu_btn_1 oculto' 	style='width:132px;margin-left:30px;' 	value='Cancelar'>
                        <input type="button" id='ficha_usu_btn_reset' class='btn_hg btnAzul2 ficha_usu_btn_2 oculto' 	style='width:132px;margin-left:30px;' 	value='Reset Clave'>
                    </div>
                </div>
            </div> 
        </div>
	</body>
</html>