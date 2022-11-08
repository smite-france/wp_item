<?php

/*
Plugin Name: Smite france item view
Plugin URI:
Description:
Version: 0.1
Author: Tilican
Author Email:
License:

Copyright 2015 Tilican

*/

define( 'SMFR_ITEM_URL', plugin_dir_url ( __FILE__ ) );
define( 'SMFR_ITEM_URI', plugin_dir_path( __FILE__ ) );
define( 'SMFR_ITEM_VERSION', '0.1a' );
define( 'SMFR_ITEM_NAME', 'Smite France item view' );
define( 'SMFR_ITEM_DB_PREFIX' , "smfr_item ");

smfr_item_load();

// CREATE HOOK !
register_activation_hook(__FILE__, 'smfr_item_activation');
register_deactivation_hook(__FILE__, 'smfr_item_deactivation');

function smfr_item_load(){

    //add front script !
	include_once(SMFR_ITEM_URI.'front/smfr_item_front.php');

    // include functions activation / deactivation
    include_once(SMFR_ITEM_URI.'install/activation.php');
    include_once(SMFR_ITEM_URI.'install/deactivation.php');
}

?>