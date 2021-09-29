<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
	</head>
	<body>
        <div id='ficha_coordinacion' class=''>
            <div class='div-tbl'>
                <div class="div-tbl-fi" style="height: 30px;">
                    <div id='titulo_ficha_coord' class="modal_titulo div-tbl-co" style='width:620px;'>- Ficha de Coordinacion -</div>
                </div>
                <div class="div-tbl-fi" style="height: 10px;"></div>
                <div class="div-tbl-fi ocultooo" style="width: 100%;">
                    <div class="div-tbl-co" style='width:20px;'></div>	
                    <div class="div-tbl-co" style='width:110px;'>
                        <input type="text" class='div-inp-trans' disabled value='Id. Coord:'>
                    </div>
                    <div class="div-tbl-co" style='width:60px;'>
                        <input type="text" id='ficha_coord_id' class='div-inp-dis' disabled>
                    </div>
                </div>

                <div class="div-tbl-fi" style="width: 340px;">
                    <div class="div-tbl-co" style='width:20px;'></div>	
                    <div class="div-tbl-co" style='width:100px;'>
                        <input type="text" class='div-inp-trans' disabled value='Descripcion:'>
                    </div>
                    <div class="div-tbl-co" style='width:220px;'>
                        <input type="text" id='ficha_coord_nombre' class='div-inp-dis' disabled>
                    </div>
                </div>


                <div class="div-tbl-fi fila_perfil " style="width: 340px;">
                    <div class="div-tbl-co" style='width:20px;'></div>
                    <div class="div-tbl-co" style='width:100px;'>
                        <input type="text" class='div-inp-trans' disabled value='Perfil:'>
                    </div>
                    <div class="div-tbl-co" style='width:140px;'>
                        <select id='sel_zona' class='div-inp-dis' style='font-weight:normal !important;'disabled>
                            <option value='[zona.id;block=option;noerr;]'>[zona.desc]</option>
                        </select>
                    </div>
                </div>
                
                <div class="div-tbl-fi" style="width: 20px;height:30px;"></div>
                <div class="div-tbl-fi" style="width:100%;height:60px;border: 0px solid red;">
                    <div class="div-tbl-co" style='width:calc(100% - 40px);left:20px;justify-content:center;'>
                        <input type="button" id='ficha_pers_btn_atr' class='btn_hg btnAzul3 ficha_pers_btn_0' 			style='width:132px;margin-left:30px;' 	value='Atrás'>
                        <input type="button" id='ficha_pers_btn_ace' class='btn_hg btnVerde ficha_pers_btn_1 oculto' 	style='width:132px;cursor:pointer;' 	value='Aceptar' disabled>
                        <input type="button" id='ficha_pers_btn_can' class='btn_hg btnRojo ficha_pers_btn_1 oculto' 	style='width:132px;margin-left:30px;' 	value='Cancelar'>
                        <input type="button" id='ficha_pers_btn_reset' class='btn_hg btnAzul2 ficha_pers_btn_2 oculto' 	style='width:132px;margin-left:30px;' 	value='Reset Clave'>
                    </div>
                </div>
            </div> 
        </div>
	</body>
</html>