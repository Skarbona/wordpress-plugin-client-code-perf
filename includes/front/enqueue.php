<?php

function fs_plugin_styles() {

    //register only on product page
    if(Is_product()) {

wp_register_script('fs_product_buttons', plugins_url('/views/js/product-buttons.js',
        PORTFOLIO_PLUGIN_URL),
    array(),
    '1.0.0',
    true
);


wp_enqueue_script('fs_product_buttons');

    }


    wp_register_script('fs_loading', plugins_url('/views/js/loading.js',
        PORTFOLIO_PLUGIN_URL),
        array(),
        '1.0.0',
        false
    );


    wp_enqueue_script('fs_loading');





}