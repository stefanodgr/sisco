<?php
    // define ("RUTA_SISTEMA","/var/www/sistemas/siscov_dev/");
    define ("RUTA_SISTEMA","/FILES1/webroot/sistemas/siscov_dev/");

    define("V", "5432");			                        // PUERTO
    define("W", "10.8.15.45");	                            // SERVIDOR DE BASE DE DATOS
    define("X", "postgres");			                            // USUARIO
    define("Y", "metro123");		                                // CLAVE
    define("Z", "siscov_dev");	                            // NOMBRE DE LA BASE DE DATOS

    // define("VA", "5432");                                   // PUERTO
    // define("WA", "10.8.15.44");                             // SERVIDOR DE BD
    // define("XA", "sa");                                     // CLAVE DEL ROL
    // define("YA", "sa");                                     // ROL DE CONEXION
    // define("ZA", "sictra");                                 // BASE DE DATOS

    define("EXP",360);		                                // TIEMPO MÁXIMO DE CONEXIÓN EN SEGUNDOS
    $nocache = substr(mktime(),strlen(mktime())-5);         // UTILIZADA PARA EVITAR ALMACENAMIENTO PERSISTENTE DE JS Y CSS
    
    ini_set("display_errors","0");
    setlocale(LC_CTYPE,'es_Es');	                        // CONFIGURACIÓN REGIONAL (IDIOMA ESPAÑOL)
    ini_set("memory_limit",'-1');	                    // MEMORIA QUE USARÁ EL SISTEMA
    error_reporting(E_ERROR);                            // MUESTRA SOLO EL "FATAL ERROR" Y OBVIA LOS WARNING.
    session_start();
?>
