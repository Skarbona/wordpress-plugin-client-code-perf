<?php
function fs_extra_author_fields( $user ) { ?>
    <h4 style="font-size:20px;"><?php _e("Perfecta extra information", "chiliit"); ?></h4>

    <table class="form-table">
        <tr>
            <th><?php _e("Department", "chiliit"); ?></th>
            <td>
                <select name="user_department" id="user_department" style="width:350px;">
                    <option value="Management" <?php selected( 'Management', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Management</option>
                    <option value="Procurement" <?php selected( 'Procurement', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Procurement</option>
                    <option value="Merchandising" <?php selected( 'Merchandising', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Merchandising</option>
                    <option value="Sales" <?php selected( 'Sales', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Sales</option>
                    <option value="Field_forces" <?php selected( 'Field_forces', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Field forces</option>
                    <option value="Other" <?php selected( 'Other', get_the_author_meta( 'user_department', $user->ID ) ); ?>>Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><?php _e("Country", "chiliit"); ?></th>
            <td>
                <select name="user_country" id="user_country" style="width:350px;">
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
            </td>
        </tr>

    </table>
<?php }