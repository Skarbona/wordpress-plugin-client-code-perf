<?php
function fs_woocommerce_before_add_to_cart_form(  ) {
    global $product;
    $productId = $product->id;
    $userId = get_current_user_id();
    ?>

    <div id="vueApp">
    <button class="ask-button"><a href="mailto:office@perfecta.com.pl">Ask for prodcut</a></button>

    <button class="ask-button" @click="showPopup" style="margin-top:15px;">Your needs</button>

         <div class="vue-popup" v-show="popupVisiblity" style="display:none;">
             <div class="vue-popup__overcontainer">
                <div class="vue-popup__container">
                            <div class="vue-popup__container--close">
                                <a @click="hidePopup">
                                <i class="fa fa-close"></i>
                                </a>
                            </div>
                    <form method="post" @submit.prevent="onSubmit">
                        <input id="userID" name="userID" value="<?php echo $userId  ?>" type="hidden" required>
                        <input id="productID" name="productID" value="<?php echo $productId  ?>" type="hidden" required>
                        <div class="form-group">
                            <label for="quantity">Quantity of product you want</label>
                            <select name="quantity" id="quantity" v-model="quantity"  required>
                                <option value="1-10">1-10</option>
                                <option value="10-100">10-100</option>
                                <option value="100-300">100-300</option>
                                <option value="300-500">300-500</option>
                                <option value="500-1000">500-1000</option>
                                <option value="1000-2000">1000-2000</option>
                                <option value="2000-5000">2000-5000</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Date of purchase</label>
                            <input type="date" id="date" name="date"
                                   v-model="date"  required
                                   >
                        </div>
                        <div class="form-group">
                            <label for="probability">Probability of purchase</label>
                            <select name="probability" id="probability" v-model="probability"  required>
                                <option value="low" selected="selected">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                            </select>
                        </div>
                        <button type="submit"  class="ask-button">Send</button>
                        <div v-show="alertWrong" class="fusion-alert alert error alert-danger fusion-alert-center fusion-alert-capitalize alert-dismissable alert-shadow" style="background-color:#f2dede;color:rgba(166,66,66,1);border-color:rgba(166,66,66,1);border-width:1px;margin-top:20px;"><button type="button" class="close toggle-alert" data-dismiss="alert" aria-hidden="true">×</button><div class="fusion-alert-content-wrapper"><span class="alert-icon"><i class="fa-lg  fa fa-exclamation-triangle"></i></span><span class="fusion-alert-content">Something go wrong. Reload and Try again.</span></div></div>
                        <div v-show="alertSuccess" class="fusion-alert alert success alert-success fusion-alert-center fusion-alert-capitalize alert-dismissable alert-shadow" style="background-color:#dff0d8;color:rgba(92,163,64,1);border-color:rgba(92,163,64,1);border-width:1px;margin-top:20px;"><button type="button" class="close toggle-alert" data-dismiss="alert" aria-hidden="true">×</button><div class="fusion-alert-content-wrapper"><span class="alert-icon"><i class="fa-lg  fa fa-check-circle"></i></span><span class="fusion-alert-content">Success! Thank You for your feedback!</span></div></div>
                    </form>

                </div>
             </div>
         </div>

    </div>
    <?php
    };
