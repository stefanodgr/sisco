var accionFichaPers = null;

    $(document).ready(function(){
        gestBtnFichaPers(0);

        $('#panel_right').on('click','#ficha_pers_btn_busq',function(){         // BOTÓN BÚSQUEDA DE PERSONAL POR CARNÉ DE FICHA GENERAL DE PERSONAL	
            
            // var persCarne = $('#ficha_pers_carne').val();
            // // alert("llego-->"+persCarne);
            // // var loginUsua = $('#ficha_pers_login').val();

            // if(!persCarne){
            //     alert('ERROR: Debe ingresar un número de carné para proceder con la búsqueda.');
            //     return false;
            // }
            // limpiarFichaPers();
            // xajax_buscarUsu(null,null,persCarne,'general');
        });
        $('#panel_right').on('keypress','#ficha_pers_carne',function(e){        // DISPARADOR DE BÚSQUEDA DE PERSONAL POR CARNÉ DE FICHA GENERAL DE PERSONAL
            if(e.which == 13){									                // SI LA TECLA PULSADA ES LA TECLA ENTER
                $('#ficha_pers_btn_busq').click();
            }
        });
        $('#panel_right').on('click','#btn_pers_atr',function(){          // BOTÓN ATRÁS DE FICHA DE VISITANTE 
            
            // if(rastroInfractor != null){
            //     $('#panel_left #opcion_Infractores').click();
            //     setTimeout(function(){
            //         xajax_buscarInfractor(rastroInfractor);
            //         rastroInfractor = null;
            //     },250);
            // }
            // else{
              
                actualizarIframePers();

                // window.frames['ifr_visita'].$('#tbl').find('.celdaSeleccionada').removeClass('celdaSeleccionada');
                // window.frames['ifr_visita'].$('#tbl').find('.onCeldaPlus').removeClass('onCeldaPlus');
            // }
        });
        $('#panel_right').on('click','#btn_pers_ace',function(){          // BOTÓN ACEPTAR MODIFICACIÓN/REGISTRO DE INFRACCIÓN  
                       
            if(!$('#'+this.id).hasClass('deshabilitado')){
                // var vteId       = $('#filt_vte_id').val();
                var persId          = $('#filt_pers_id').val();
                var persCedula      = formatoCedula($('#filt_nac').val(),$('#filt_cedula').val());
                var persNombre      = $('#filt_nombre').val();
                var persApellido    = $('#filt_apellido').val(); 
                var persTipTelf     = $('#filt_tipo_telf').val();
                var persTelf        = $('#filt_telf').val();
                var persCorreo      = $('#filt_correo').val();
                var persEstado      = $('#filt_estado').val();
                //  var persEstado     = $('#filt_estado').attr('name');
                var persMunicipo    = $('#comboMunicipio').val();
                var persParroquia   = $('#comboParroquia').val();
                var persCentroVo    = $('#comboCentroVo').val();
                var persElectoral   = $('#filt_electoral').val();
                var persMilita      = $('#filt_milita').val();
                var persPostu       = $('#filt_postu').val();

                // alert("-->"+persEstado);

// alert("-Cedula->"+persCedula+"-Nombre->"+persNombre+"--Apellido->"+persApellido+"--TipoTelf-->"+persTipTelf+"--telf-->"+persTelf);
// alert("--Correo->"+persCorreo+"--TipoCorreo->"+persTipCorreo+"--Estado-->"+persEstado+"--Municipio-->"+persMunicipo+"--Parroquia->"+comboParroquia+"--CentroVo-->"+comboCentroVo);
// alert("--->"+persCentroVo);

                
                // if((!persCedula) || (persCedula == null)){
                //     alert('ERROR: Debe ingresar el Cedula del personal.');
                //     return false;
                // }

                if((!persNombre) || (persNombre == '')){
                    alert('ERROR: Debe ingresar el Nombre.');
                    return false;
                }

                if((!persApellido)|| (persApellido == null)){
                    alert('ERROR: Debe ingresar el Apellido.');
                    return false;
                }
                
                
                if((!persTipTelf) || (persTipTelf == 0)){
                    alert('ERROR: Debe ingresar el tipo de Codigo.');
                    return false;
                }

                if((!persTelf)|| (persTelf == null)){
                    alert('ERROR: Debe ingresar el Telefono.');
                    return false;
                }

                if((!persCorreo)|| (persCorreo == null)){
                    alert('ERROR: Debe ingresar el Correo.');
                    return false;
                }

                if((!persEstado) || (persEstado == 0)){
                    alert('ERROR: Debe ingresar el Estado.');
                    return false;
                }

                if((!persMunicipo) || (persMunicipo == 0) || (persMunicipo == 'Seleccione....')){
                    alert('ERROR: Debe ingresar el Municipio.');
                    return false;
                }

                if((!persParroquia) || (persParroquia == 0) || (persParroquia == 'Seleccione....')){
                    alert('ERROR: Debe ingresar la Parroquia .');
                    return false;
                }

                if((!persCentroVo) || (persCentroVo == 0) || (persCentroVo == 'Seleccione....')){
                    alert('ERROR: Debe ingresar el Centro Votacion.');
                    return false;
                }

                if((!persElectoral) || (persElectoral == 0)){
                    alert('ERROR: Debe ingresar Electoral.');
                    return false;
                }

                if((!persMilita) || (persMilita == 0)){
                    alert('ERROR: Debe ingresar Militancia.');
                    return false;
                }

                if((!persPostu) || (persPostu == 0)){
                    alert('ERROR: Debe ingresar Postulacion.');
                    return false;
                }



                if(!persId) var msgConfFichaPers = '¿Confirmar creación de este personal?';
                else var msgConfFichaPers = '¿Confirmar modificación del personal?';

                if(confirm(msgConfFichaPers)){
            xajax_gestionPersonal(persId,accionFichaPers,persCedula,persNombre,persApellido,persTipTelf,persTelf,persCorreo,persCentroVo,persElectoral,persMilita,persPostu);
                }
            }
        });   
//         $('#panel_right').on('click','#ficha_pers_btn_reset',function(){         // BOTÓN ACEPTAR DE FICHA GENERAL DE PERSONAL
//             if(accionFichaPers == 'modificar'){

//                 // $('.fila_login').addClass('oculto');
//                 // $('#ficha_pers_login').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
// alert("---lelgo");
//                     xajax_resetClave(null, null, $usuId, null, $accion,null);
//                 }else{
//                 alert("El usuario no esta registrado");
//             }
          
//         });
        $('#panel_right').on('click','#btn_pers_can',function(){         // BOTÓN CANCELAR DE FICHA GENERAL DE PERSONAL									              
            if(accionFichaPers == 'modificar'){
                
                $('#btn_pers_atr').click();
                accionFichaPers = '';
            }
            else limpiarFichaPers();
        });
    });

    function BtnPers(opc){
        opc = parseInt(opc);
        switch (opc){
            case 0: // AL CARGAR LA FICHA DE VISITANTE
                $('.frm_0').removeClass('div-inp-dis').addClass('div-inp-ena').prop('disabled',false);
                $('.frm_1').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                $('.frm_2').prop('disabled',true);
                $('#btn_busq_area, #btn_busq_pers_vis, #btn_tomar_foto').addClass('deshabilitado');
                $('#btn_busq_visitante, #btn_busq_pers').removeClass('deshabilitado');
                $('#filt_descripcion').removeClass('div-inp-ena').addClass('div-inp-dis');
                infAcceso(0);
                gestionBtnAceptarVisita(0);
            break;
            case 1: // PERSONA ENCONTRADA EN TABLA VISITANTE PERSONAL METRO
                $('.frm_0').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                $('.frm_2').prop('disabled',false);
                $('#btn_busq_area, #btn_busq_pers_vis').removeClass('deshabilitado');
                $('#btn_busq_visitante, #btn_busq_pers').addClass('deshabilitado');
                $('#filt_descripcion').removeClass('div-inp-dis').addClass('div-inp-ena');
            break;
            case 2: // PERSONA NO ENCONTRADA EN TABLA VISITANTE NI EN TABLA PERSONAL
                $('.frm_0').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                $('.frm_2').prop('disabled',false);
                $('.frm_1').removeClass('div-inp-dis').addClass('div-inp-ena').prop('disabled',false);
                $('#filt_descripcion').removeClass('div-inp-dis').addClass('div-inp-ena');
                $('#btn_busq_area, #btn_busq_pers_vis, #btn_tomar_foto').removeClass('deshabilitado');
                $('#btn_busq_visitante, #btn_busq_pers').addClass('deshabilitado'); 
            break;
        }
    }
    
    function campoPers(opc){
        var opc = parseInt(opc);

        if(moduloFichaPers == 'usuario')    var campoFichaPers = '#ficha_usu_login';  

        switch (opc){
            case 0: // DESACTIVA LOS CAMPOS EDITABLES DEL FORMULARIO
                // $('#ficha_pers_carne').removeClass('div-inp-dis').addClass('div-inp-ena').prop('disabled',false);
                // $(campoFichaPers).removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                
                if((moduloFichaPers == 'usuario') && (snPerfUsu == 'SISTEMAS')){
                    $('.fila_perfil').addClass('oculto');
                   
                    // $('.ficha_pers_login').addClass('oculto');
                    $('#ficha_pers_perfil').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                    // $('#ficha_pers_login').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);
                }
            break;
            case 1: // ACTIVA LOS CAMPOS EDITABLES DEL FORMULARIO
                // $('#ficha_pers_carne').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);   
                // $(campoFichaPers).removeClass('div-inp-dis').addClass('div-inp-ena').prop('disabled',false);   

                if((moduloFichaPers == 'usuario') && (snPerfUsu == 'SISTEMAS')){
                    $('.fila_perfil').removeClass('oculto');
                    $('.fila_login').removeClass('oculto');
                    $('#ficha_usu_perfil').addClass('div-inp-ena').removeClass('div-inp-dis').prop('disabled',false);
                    $('#ficha_usu_login').addClass('div-inp-ena').removeClass('div-inp-dis').prop('disabled',false);
                }
            break;
        }
    }
    function limpiarFichaPers(){
        $('#filt_nac')       .val('V'); 
        $('#filt_cedula')    .val(''); 
        $('#filt_nombre')    .val(''); 
        $('#filt_apellido')  .val('');
        $('#filt_tipo_telf') .val(0);
        $('#filt_telf')      .val(''); 
        $('#filt_correo')    .val('');
        $('#filt_estado')    .val(0); 
        $('#comboMunicipio') .val(''); 
        $('#comboParroquia') .val(''); 
        $('#comboCentroVo')  .val('');
        $('#filt_electoral') .val(0); 
        $('#filt_milita')    .val(0); 
        $('#filt_postu')     .val(0); 
        // BtnPers(0);
        // campoPers(0);

    }
    function actualizarIframePers(){
        $('#ficha_visita').addClass('oculto');
        $('#div_opc').show();
        $('#div_filtros').removeClass('oculto');
        $('#div_visita').removeClass('oculto');

        limpiarFichaPers();
        // gestionMostrarBotones(2);

        if(ctrlActIfr){
            window.frames['ifr_visita'].recargar();
            ctrlActIfr = false;
        }
    }
/* ---------------------------------------------------------------------------------------------------------------------------------- */