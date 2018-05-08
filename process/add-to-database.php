<?php

function fs_add_to_database() {

    global $wpdb;

    $output      =  array('status' => 1);
    $userID      = absint($_POST['userID']);
    $productID   = absint($_POST['productID']);
    $date        = $_POST['date'] . '-01';
    $probability = $_POST['probability'];
    $quantity    = $_POST['quantity'];

    $wpdb->insert(
        $wpdb->prefix . 'clients_needs',
        array(
            'client_id'   => $userID,
            'product_id'  => $productID,
            'quantity'    => $quantity,
            'date'        => $date,
            'probability' => $probability
        )
    );

    $output['status'] = 2;
    wp_send_json($output);


}
