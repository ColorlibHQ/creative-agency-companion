<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Creative_Agency Companion
 * @Version    : 1.1
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Sidebar widgets include
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'about-widget.php';
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'blog-widget.php';
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'contact-info.php';
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'instagram.php';
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'newsletter-widget.php';
require_once CREATIVE_AGENCY_COMPANION_SW_DIR_PATH. 'social-links.php';

// Metabox include
require_once CREATIVE_AGENCY_COMPANION_INC_DIR_PATH . 'creativeagency-metabox.php';

// Elementor widgets include
require_once CREATIVE_AGENCY_COMPANION_INC_DIR_PATH . 'functions.php';
require_once CREATIVE_AGENCY_COMPANION_INC_DIR_PATH . 'instagram-api.php';
require_once CREATIVE_AGENCY_COMPANION_EW_DIR_PATH . 'elementor-widget.php';

// Demo import include
require_once CREATIVE_AGENCY_COMPANION_DEMO_DIR_PATH . 'demo-import.php';

?>