<?php

//smfr_god_shortcode
add_shortcode('smfr_item','smfr_item_shortcode');


function smfr_item_front_scripts() {
    wp_register_script(
        SMFR_ITEM_DB_PREFIX.'idTabs',
        SMFR_ITEM_URL.'front/js/jquery.idTabs.min.js'
    );
    wp_enqueue_script('jquery');
    wp_enqueue_script(SMFR_ITEM_DB_PREFIX.'idTabs');
}

function smfr_item_front_styles() {
    wp_register_style(
        SMFR_ITEM_DB_PREFIX.'style',
        SMFR_ITEM_URL.'front/css/style.css'
    );
    wp_enqueue_style(SMFR_ITEM_DB_PREFIX.'style');
}


function smfr_item_shortcode(){
    smfr_god_front_styles();
    smfr_god_front_scripts();
    /* INCLUDE ALL FUNCTIONS WE NEED ! */
    include('fnc/fnc_debug.php');
    include('fnc/fnc_item.php');
    /* FIN */
	?>
	
	<span style="color:white;font-size:35px;line-height : 20px;">Cette page est en cours de developpement !</span>
<br class="clear">
	
	<?php
    echo "<div class='smfr_item'>";
    // si on a un id dieu selectionné !
    if(isset($_GET['id_item']) && $_GET['id_item'] > 0){
        include 'page/smfr_item_front_pre.php';
    }
    else {
        include 'page/smfr_item_front_list.php';
    }
    echo "</div>";
}