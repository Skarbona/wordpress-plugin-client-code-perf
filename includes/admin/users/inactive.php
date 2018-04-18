<?php
function fs_inactive($user_id) {

    if ( ! is_admin() ) { //Only NOT ADMIN PAGE
        $user = new WP_User($user_id);
        // Remove all user roles after registration
        foreach($user->roles as $role){
            $user->remove_role($role);
        }
    }

}