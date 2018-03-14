<?php
function fs_shop_display_skus() {

    global $product;

    if ( $product->get_sku() ) {

        echo '<div class="product-meta front"> ' . $product->get_sku() . '</div>';
}
}


//function fs_pb_remove_images_class( $classes, $bundled_item ) {
//    $classes = array_diff( $classes, array( 'images' ) );
//    return $classes;
//}