<?php

function fs_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('http://shop4.mototra2.pro-linuxpl.com/wp-content/uploads/2018/03/logo-sklep.png');
            height:auto;
            width:300px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }


function fs_login_logo_url($url) {
    return get_bloginfo( 'url' );
}