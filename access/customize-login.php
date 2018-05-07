<?php

function fs_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php  echo WP_PLUGIN_URL . '/chiliit/img/logo-sklep.png'  ?> );
            height:80px;
            width:300px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        body.login {
            background-image: url(<?php echo WP_PLUGIN_URL . '/chiliit/img/nowoczesne-tech-1600-1600.jpg'  ?>);
            background-size: cover;
            background-attachment:fixed;

        }
        #backtoblog {
            display:none;

        }
        .login.wp-core-ui .button-primary {
            background:   rgba(91,167,121,0.81)!important;
            border-color:   rgba(91,167,121,0.81)!important;
            box-shadow: 0 1px 0   rgba(91,167,121,0.81)!important;
            color: #fff;
            text-decoration: none;
            text-shadow: none!important;
        }
        .login #nav {
            margin-top: 20px!important;
            margin-left: 0;
            padding: 26px 24px 26px!important;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,.13);
        }
        .login #nav {
            color:#fff;
        }
        .login #nav a {
            font-weight:300;
            text-align:center;
            font-size:25px;
            width:100%;
            padding:5px;
            display:block;
        }
        #reg_passmail {
            display:none!important
         }
    </style>
<?php }


function fs_login_logo_url($url) {
    return get_bloginfo( 'url' );
}