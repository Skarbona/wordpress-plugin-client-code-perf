<?php

function fs_register_message() {
    $html = '
        <div style="margin:5px 0;border:1px solid red;padding:5px">
            <p style="margin:5px 0;color:#ff4349;font-weight:700;">
            Registration confirmation will be emailed to you. Than you can set your password.
             Also your registration must be confirmed by Administratior
            </p>
        </div>';
    echo $html;
}