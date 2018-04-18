<?php
function save_fs_extra_author_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'user_department', $_POST['user_department'] );
    update_user_meta( $user_id, 'user_country', $_POST['user_country'] );

}