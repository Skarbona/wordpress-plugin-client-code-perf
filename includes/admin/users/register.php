<?php
function fs_registration_form() {

    $first_name = ! empty( $_POST['first_name'] ) ?  $_POST['first_name']  : '';
    $last_name = ! empty( $_POST['last_name'] ) ?  $_POST['last_name']  : '';

    ?>
    <p>
        <label for="first_name"><?php esc_html_e( 'First Name', 'chiliit' ) ?><br/>

            <input type="text"
                   id="first_name"
                   name="first_name"
                   value="<?php echo esc_attr( $first_name ); ?>"
                   class="input"
                   required
            />
        </label>
    </p>
    <p>
        <label for="last_name"><?php esc_html_e( 'Last Name', 'chiliit' ) ?><br/>

            <input type="text"
                   id="last_name"
                   name="last_name"
                   value="<?php echo esc_attr( $last_name ); ?>"
                   class="input"
                   required
            />
        </label>
    </p>
    <p>
        <select name="user_department" id="user_department" style="width:100%;height:35px;">
            <option value="Management" <?php selected( 'Management', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Management</option>
            <option value="Procurement" <?php selected( 'Procurement', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Procurement</option>
            <option value="Merchandising" <?php selected( 'Merchandising', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Merchandising</option>
            <option value="Sales" <?php selected( 'Sales', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Sales</option>
            <option value="Field_forces" <?php selected( 'Field_forces', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Field forces</option>
            <option value="Other" <?php selected( 'Other', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Other</option>
        </select>
    </p>

    <br/>
    <p>
        <select name="user_country" id="user_country" style="width:100%;height:35px;">
            <option value="Poland" <?php selected( 'Poland', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Poland</option>
            <option value="United_Kingdom" <?php selected( 'United_Kingdom', get_the_author_meta( 'user_country', $user->ID ) ); ?>>United Kingdom</option>
            <option value="Germany" <?php selected( 'Germany', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Germany</option>
            <option value="Holland" <?php selected( 'Holland', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Holland</option>
            <option value="Belgium" <?php selected( 'Belgium', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Belgium</option>
            <option value="Spain" <?php selected( 'Spain', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Spain</option>
            <option value="Italy" <?php selected( 'Italy', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Italy</option>
            <option value="Brasil" <?php selected( 'Brasil', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Brasil</option>
            <option value="Other" <?php selected( 'Other', get_the_author_meta( 'user_country', $user->ID ) ); ?>>Other</option>
        </select>
    </p>
    <?php
}

function fs_registration_errors( $errors, $sanitized_user_login, $user_email ) {

    if ( empty( $_POST['first_name'] ) ) {
        $errors->add( 'first_name', __( '<strong>ERROR</strong>: Please enter your adress.', 'chiliit' ) );
    }
    if ( empty( $_POST['last_name'] ) ) {
        $errors->add( 'last_name', __( '<strong>ERROR</strong>: Please enter your adress.', 'chiliit' ) );
    }

    return $errors;
}

function fs_user_register( $user_id ) {
    if ( ! empty( $_POST['first_name'] ) ) {
        update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
    }
    if ( ! empty( $_POST['last_name'] ) ) {
        update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
    }
    if ( ! empty( $_POST['user_department'] ) ) {
        update_user_meta( $user_id, 'user_department', $_POST['user_department'] );
    }
    if ( ! empty( $_POST['user_country'] ) ) {
        update_user_meta( $user_id, 'user_country', $_POST['user_country'] );
    }
}