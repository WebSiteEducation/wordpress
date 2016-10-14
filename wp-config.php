<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'LAHUC]yZiVh3+<i5Ay35,8%9}_WO%L7NWs`upt@-P~[zQ0L$t^^|suJF+2x*aJ5u');
define('SECURE_AUTH_KEY', 'm)Q@!<eS?{60tTv`^pNQhi9KuFuWoJ@Y]74-jyISkWP*UrvtZS9#=Q.OOY7SbY@S');
define('LOGGED_IN_KEY', '(%,;QJDU]OD!}RM~P[]ux#]SKz[=E!Rkv? -8~#;;?vS]A~:I~jhxr2Bh_oii#d{');
define('NONCE_KEY', '~gK%w3Hb;=^(yC{m^`L@z+}c+=-/$@,mj}tY>$=9VZpQprht=Y0|B>t0MEE1bjHS');
define('AUTH_SALT', 'tYz</Hw)WNt2y6|r1Iqo-9)(Qdhus[xe2mcgHOcLO9;:g=TqmHG7/&I@xdE:i|iv');
define('SECURE_AUTH_SALT', 'zuE+0t5J$S2}uvTp$+k{M@q$&ANl2nRxCeal<F(y#h~J#sgUZ;sXd8*~Tt.#zaOR');
define('LOGGED_IN_SALT', '{4M&S:/s<{M?5<zw4Gh.{ln8{X.X5Y=cKHWW_g5E3vzEQ.UWdD=Uffav)rJ`e+H[');
define('NONCE_SALT', '6|h>D/|HsA|-^O43MLwqHS6pAhb4^ u?.@AIc}ejpBxF_</`Ii_9ey9vM~BNKqIf');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

