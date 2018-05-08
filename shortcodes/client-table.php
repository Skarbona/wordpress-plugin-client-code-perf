<?php
function fs_clients_table_function( $atts ){

    global $wpdb;

    $table_name = $wpdb->prefix . "clients_needs";

    $table = $wpdb->get_results( "SELECT * FROM $table_name" );

    $table_values = '<div class="table-1"><table style="width:100%;text-align:left;"><tbody><tr>
                    <th>Product Name</th>
                    <th>Username</th>
                    <th>Quantity</th>
                    <th>Probability</th>
                    <th>Date</th></tr>';

    foreach(array_reverse($table) as $value) {
        $user_info = get_user_meta($value->client_id,'user_country');
        $post_info = get_post($value->product_id);
        $post_link = get_permalink($value->product_id);
        $post_date = date("F Y", strtotime($value->date));
       
        $table_values .= "<tr> 
             <td><a href='$post_link'>$post_info->post_title</a></td>
             <td>$user_info[0]</td>
             <td>$value->quantity</td>
             <td>$value->probability</td>
             <td>$post_date</td>
        </tr>";

    }
    $product_list = array();

    foreach(array_reverse($table) as $value) {

        if(!in_array($value->product_id,$product_list)) {
            array_push($product_list,$value->product_id);
        }
    }

    

    $table_values .= '</tbody></table>';
    return print_r($product_list);


}
