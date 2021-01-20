<?php
/*
 * Plugin Name:       Creative_Agency Companion
 * Plugin URI:        https://colorlib.com/wp/themes/creativeagency/
 * Description:       Creative_Agency Companion is a companion for Creative_Agency theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       creativeagency-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_VERSION' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_DIR_PATH' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_INC_DIR_PATH' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_INC_DIR_PATH', CREATIVE_AGENCY_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_SW_DIR_PATH' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_SW_DIR_PATH', CREATIVE_AGENCY_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_EW_DIR_PATH' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_EW_DIR_PATH', CREATIVE_AGENCY_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'CREATIVE_AGENCY_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'CREATIVE_AGENCY_COMPANION_DEMO_DIR_PATH', CREATIVE_AGENCY_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Creative_Agency' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Creative_Agency' == $is_parent->get( 'Name' ) ) ){
    require_once CREATIVE_AGENCY_COMPANION_DIR_PATH . 'creativeagency-init.php';
}else{

    add_action( 'admin_notices', 'creativeagency_companion_admin_notice', 99 );
    function creativeagency_companion_admin_notice() {
        $url = 'https://demo.colorlib.com/creativeagency/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Creative_Agency Companion</strong> plugin you have to also install the %1$sCreative_Agency Theme%2$s', 'creativeagency-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>