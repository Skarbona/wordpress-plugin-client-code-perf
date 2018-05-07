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

    wp_register_script('fs_vuejs', plugins_url('/views/js/vue.js',
        PORTFOLIO_PLUGIN_URL),
        array(),
        '1.0.0',
        true
    );

    wp_enqueue_script('fs_vuejs');

    wp_register_script('fs_vuejs-instance', plugins_url('/views/js/vue-instance.js',
        PORTFOLIO_PLUGIN_URL),
        array(),
        '1.0.0',
        true
    );
    wp_localize_script('fs_vuejs-instance','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php')
    ));


    wp_enqueue_script('fs_vuejs-instance');


    wp_register_style('fs_styles',plugins_url('/views/css/styles.css',
        PORTFOLIO_PLUGIN_URL));

    wp_enqueue_style('fs_styles');





}