<?php
function fs_clients_table_function( $atts, $content = null ) {  ob_start();

    global $wpdb;

    $table_name = $wpdb->prefix . "clients_needs";

    $table = $wpdb->get_results( "SELECT * FROM $table_name" );
    $productHandler = [];

    foreach(array_reverse($table) as $key=>$value) {

        $post_date = date("Y m", strtotime($value->date));

        if($post_date >= date("Y m") && $post_date <= date("Y m", strtotime("+11 months"))) {

            $user_info = get_user_meta($value->client_id,'user_country');
            $p_l = 0;$p_m = 0;$p_h = 0;
            if($value->probability === "low") {
                $p_l =  $value->quantity;
            }  else if($value->probability === "medium") {
                $p_m =  $value->quantity;
            } else {
                $p_h =  $value->quantity;
            }
            $m1 = $m2 = $m3 = $m4 = $m5 = $m6 = $m7 = $m8 = $m9 = $m10 = $m11 = $m12 = 0;
            if($post_date === date("Y m")) {
                $m1 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+1 months"))) {
                $m2 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+2 months"))) {
                $m3 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+3 months"))) {
                $m4 = $value->quantity;
            }  else if ($post_date === date("Y m", strtotime("+4 months"))) {
                $m5 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+5 months"))) {
                $m6 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+6 months"))) {
                $m7 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+7 months"))) {
                $m8 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+8 months"))) {
                $m9 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+9 months"))) {
                $m10 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+10 months"))) {
                $m11 = $value->quantity;
            } else if ($post_date === date("Y m", strtotime("+11 months"))) {
                $m12 = $value->quantity;
            } else {

            }

            $productHandler[$key] = [
                "product"       =>  $value->product_id,
                "country"       =>  $user_info[0],
                "qty"           =>  $value->quantity,
                "p_l"           =>  $p_l,
                "p_m"           =>  $p_m,
                "p_h"           =>  $p_h,
                "m1"             =>  $m1,
                "m2"             =>  $m2,
                "m3"             =>  $m3,
                "m4"             =>  $m4,
                "m5"             =>  $m5,
                "m6"             =>  $m6,
                "m7"             =>  $m7,
                "m8"             =>  $m8,
                "m9"             =>  $m9,
                "m10"            =>  $m10,
                "m11"            =>  $m11,
                "m12"            =>  $m12,


            ];
        }


    }

    $compHandler = [];
    foreach( $productHandler as $value ) {
        $compHandler[ $value['product'] ][] = $value;
    }

    $lasthandler = [];
    foreach( $compHandler as $values ) {
        foreach($values as $value){

            if (empty($lasthandler[$value['product']])) {

                $lasthandler[$value['product']] = [];
                array_push($lasthandler[$value['product']] , $value);

            } else {

                array_push($lasthandler[$value['product']] , $value);

            }
        }
    }

    $output = [];
    foreach($lasthandler as $klucz => $values) {

        $output[$klucz] = [];
        foreach($values as $value) {

            $key = $value['country'];
            if (array_key_exists($key, $output[$klucz])) {

                    $output[$klucz][$key]['qty'] += $value['qty'];
                    $output[$klucz][$key]['p_l'] += $value['p_l'];
                    $output[$klucz][$key]['p_m'] += $value['p_m'];
                    $output[$klucz][$key]['p_h'] += $value['p_h'];
                    $output[$klucz][$key]['m1']  += $value['m1'];
                    $output[$klucz][$key]['m2']  += $value['m2'];
                    $output[$klucz][$key]['m3']  += $value['m3'];
                    $output[$klucz][$key]['m4']  += $value['m4'];
                    $output[$klucz][$key]['m5']  += $value['m5'];
                    $output[$klucz][$key]['m6']  += $value['m6'];
                    $output[$klucz][$key]['m7']  += $value['m7'];
                    $output[$klucz][$key]['m8']  += $value['m8'];
                    $output[$klucz][$key]['m9']  += $value['m9'];
                    $output[$klucz][$key]['m10'] += $value['m10'];
                    $output[$klucz][$key]['m11'] += $value['m11'];
                    $output[$klucz][$key]['m12'] += $value['m12'];

            } else {
                $output[$klucz][$key] = $value;
            }

        }
    }


    ?>
    <div class="table-1">
        <table style="width:100%;text-align:left;">
            <tbody>
                <tr>
                     <th></th>
                     <th>Product</th>
                     <th>Country</th>
                     <th>Qty</th>
                     <th colspan="3" class="th-3">
                        <table>
                            <tr>
                                <div class="table_prob__title">Probability</div>
                            </tr>
                            <tr>
                                <div class="table_prob">Low</div>
                                <div class="table_prob">Mid</div>
                                <div class="table_prob">High</div>
                            </tr>
                        </table>
                     </th>
                     <th><?php echo date("Y, M"); ?></th>
                     <th><?php echo date("Y, M", strtotime("+1 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+2 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+3 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+4 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+5 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+6 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+7 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+8 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+9 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+10 months")); ?></th>
                     <th><?php echo date("Y, M", strtotime("+11 months")); ?></th>
                </tr>


                        <?php
                            foreach($output as $products){

                                foreach($products as $countries) {
                                    $post_img  = get_the_post_thumbnail_url($countries["product"],'thumbnail');
                                    $post_imgF = get_the_post_thumbnail_url($countries["product"],'full');
                                    $post_info = get_post($countries["product"]);
                                    $post_link = get_permalink($countries["product"]);

                                        echo '<tr>
                                              <td class="table__image">
                                                <a href="' . $post_imgF . '" class="fusion-lightbox"
                                                  data-rel="iLightbox[7c816a7cf99a7ecc3e7]" 
                                                  data-title="' .  $post_info->post_title  . '<br/>
                                                  <b>' .  $countries["country"]  .   ', QTY: ' . $countries["qty"] . '</b>" 
                                                  title="' .  $post_info->post_title  . '"
                                                   data-caption="
                                                   Low: ' .  $countries["p_l"]      . '
                                                   , Medium: ' .  $countries["p_m"]      . '
                                                   , High: ' .  $countries["p_h"]      . '
                                           
                                                   ">
                                                  <img 
                                                  src="' . $post_img . '" /> 
                                                 </a>
                                              </td>
                                              <td><a href='. $post_link . '>' .  $post_info->post_title  . '</a></td>' .
                                             '<td>' .  $countries["country"]  . '</td>' .
                                             '<td>' .  $countries["qty"]      . '</td>' .
                                             '<td  class="table_prob--td">' .  $countries["p_l"]      . '</td>' .
                                             '<td  class="table_prob--td">' .  $countries["p_m"]      . '</td>' .
                                             '<td  class="table_prob--td">' .  $countries["p_h"]      . '</td>' .
                                             '<td>' .  $countries["m1"]       . '</td>' .
                                             '<td>' .  $countries["m2"]       . '</td>' .
                                             '<td>' .  $countries["m3"]       . '</td>' .
                                             '<td>' .  $countries["m4"]       . '</td>' .
                                             '<td>' .  $countries["m5"]       . '</td>' .
                                             '<td>' .  $countries["m6"]       . '</td>' .
                                             '<td>' .  $countries["m7"]       . '</td>' .
                                             '<td>' .  $countries["m8"]       . '</td>' .
                                             '<td>' .  $countries["m9"]       . '</td>' .
                                             '<td>' .  $countries["m10"]      . '</td>' .
                                             '<td>' .  $countries["m11"]      . '</td>' .
                                             '<td>' .  $countries["m12"]      . '</td>' .
                                             '</tr>';

                                }

                            }
                        ?>
            </tbody></table>
    </div>
<?php



    return ob_get_clean();
}
