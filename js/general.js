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
        $('#panel_right').on('click','#ficha_usu_btn_atr',function(){         // BOTÓN ATRÁS DE FICHA GENERAL DE PERSONAL	

            if(moduloFichaPers == 'usuario'){
                $('#div_ref_usu').removeClass('oculto');
                $('#div_ref_aux_usu').addClass('oculto');
                $('#div_ref_aux_usu').html('');
                window.frames['ifr_ref'].$('#tbl').find('.celdaSeleccionada').removeClass('celdaSeleccionada');
                window.frames['ifr_ref'].$('#tbl').find('.onCeldaPlus').removeClass('onCeldaPlus');
            }
            moduloFichaPers = null;
        });
        $('#panel_right').on('click','#ficha_usu_btn_ace',function(){         // BOTÓN ACEPTAR DE FICHA GENERAL DE PERSONAL

            // var persId      = $('#ficha_pers_id').val();	        // ID DEL PERSONAL EN TABLA PERSONAL SICTRA
            var usuId       = $('#ficha_pers_usu_id').val();        // SEDE A LA QUE PERTENECE EL USUARIO (PERSONAL)
            // var persCarne   = $('#ficha_pers_carne').val();         // CARNÉ DEL PERSONAL
            var persPerfil  = $('#ficha_pers_perfil').val();        // PE
            //USUARIO RFIL DEL PERSONAL
            if(moduloFichaPers == 'usuario'){
                var usuNombre = $('#ficha_usu_nombre').val();	    // ID DE LA SEDE A LA CUAL SERÁ ASIGNADO EL USUARIO
                var usuPerfil = $('#ficha_usu_perfil').val();	    // ID DE LA SEDE A LA CUAL SERÁ ASIGNADO EL USUARIO
                var loginUsua = $('#ficha_usu_login').val();	    // ID DE LA SEDE A LA CUAL SERÁ ASIGNADO EL USUARIO
                    //alert("idUsua--->"+usuId);
                if(!loginUsua){
                    alert("ERROR: Debe especificar la Login a la cual será asignado el usuario.");
                    $('#ficha_usu_login').focus();
                    return false;
                }
                if(!usuNombre){
                    alert("ERROR: Debe especificar la Nombre a la cual será asignado el usuario.");
                    $('#ficha_usu_nombre').focus();
                    return false;
                }
                if(!usuPerfil){
                    alert("ERROR: Debe especificar la Perfil a la cual será asignado el usuario.");
                    $('#ficha_usu_perfil').focus();
                    return false;
                }

                if(!usuId) var msgConfFichaPers = '¿Confirmar creación de este usuario?';
                else var msgConfFichaPers = '¿Confirmar modificación del usuario?';

                if(confirm(msgConfFichaPers)){
                    xajax_gestionUsuario(usuId,usuNombre,usuPerfil,accionFichaPers,loginUsua);
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
        $('#panel_right').on('click','#ficha_usu_btn_can',function(){         // BOTÓN CANCELAR DE FICHA GENERAL DE PERSONAL									              
            if(accionFichaPers == 'modificar'){
                
                $('#ficha_usu_btn_atr').click();
                accionFichaPers = '';
            }
            else limpiarFichaPers();
        });
    });

    function gestBtnFichaPers(opc){
        var opc = parseInt(opc);
        switch (opc){
            case 0:
                $('#titulo_ficha_pers').html('- Modificar Usuario -');
                $('.ficha_usu_btn_0').removeClass('oculto');
                $('.ficha_pers_btn_1').addClass('oculto').prop('disabled',true);
                $('.ficha_pers_btn_2').addClass('oculto').prop('disabled',true);
                // $('#ficha_pers_login').addClass('oculto').prop('disabled',false);
                $('#ficha_pers_btn_busq').removeClass('deshabilitado').prop('disabled',false);
            break;
            case 1:
                $('#titulo_ficha_pers').html('- Ficha de Usuario -');
                $('.ficha_pers_btn_0').addClass('oculto');
                $('.ficha_pers_btn_1').removeClass('oculto').prop('disabled',false);
                $('.ficha_pers_btn_2').removeClass('oculto').prop('disabled',false);
                // $('#ficha_pers_login').addClass('oculto').prop('disabled',false);
                $('#ficha_pers_btn_busq').addClass('deshabilitado').prop('disabled',true);
            break;
            case 2:
                $('.ficha_pers_btn_0, .ficha_pers_btn_1').addClass('oculto');
                $('.ficha_pers_btn_1').addClass('oculto').prop('disabled',true);
                // $('#ficha_pers_login').addClass('deshabilitado').prop('disabled',true);
                $('#ficha_pers_carne').removeClass('div-inp-ena').addClass('div-inp-dis').prop('disabled',true);    
                $('#ficha_pers_btn_busq').addClass('deshabilitado').prop('disabled',true);
            break;
            // case 3:
            // $('#ficha_pers_login').addClass('deshabilitado').prop('disabled',true);
            // break;
        }
    }
    function gestCmpFichaPers(opc){
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
        // $('#ficha_usu_id')         .val(''); 
        // $('#ficha_pers_usu_id')     .val(''); 
        // $('#ficha_pers_carne')      .val(''); 
        // $('#ficha_pers_cedula')     .val(''); 
        // $('#ficha_pers_nombre')     .val('');
        // $('#ficha_pers_apellido')   .val('');
        // $('#ficha_pers_cargo')      .val(''); 
        // $('#ficha_pers_perfil')     .val(0);
        // $('#ficha_pers_login')      .val(''); 
        // $('#ficha_pers_foto')       .attr('src','multimedia/imagen/icono/siluetaHombre.png');
        gestBtnFichaPers(0);
        gestCmpFichaPers(0);
    }
    function actualizarIframe(){
        var modulo = moduloFichaPers;
        accionFichaPers = '';

        $('#ficha_usu_btn_atr').click();
        if(modulo == 'usuario')     window.frames['ifr_ref'].recargar(); 
    }
/* ---------------------------------------------------------------------------------------------------------------------------------- */