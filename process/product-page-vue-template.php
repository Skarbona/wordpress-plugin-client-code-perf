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
                    <form>
                        <input name="userID" value="<?php echo $userId  ?>" type="hidden" required>
                        <input name="productID" value="<?php echo $productId  ?>" type="hidden" required>
                        <div class="form-group">
                            <select>
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
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <select>
                                <option value="low">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                            </select>
                        </div>
                    </form>

                </div>
             </div>
         </div>

    </div>
    <?php
    };
