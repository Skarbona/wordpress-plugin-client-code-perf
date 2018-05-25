

new Vue({
    el: '#vueApp',
    data: {
        popupVisiblity: false,
        alertWrong: false,
        alertSuccess: false,
        probability: 'low',
        quantity: 200,
        userID: document.querySelector('#userID').value,
        productID: document.querySelector('#productID').value,

    },
    computed: {
        date() {
            return document.querySelector('#date').value;
        }
    },
    methods: {
        showPopup(){
            this.popupVisiblity = true;
        },
        hidePopup(){
            this.popupVisiblity = false;
        },
        onSubmit() {


                var postData = {
                    action : 'fs_add_to_database',
                    date: this.date,
                    probability: this.probability,
                    quantity: this.quantity,
                    userID: this.userID,
                    productID: this.productID

                };


                var thisOne = this;
                jQuery.post(
                    ajax_object.ajax_url,
                    postData,
                    function (response) {
                        if(response.status === 2) {
                            thisOne.alertWrong = false;
                            thisOne.alertSuccess = true;
                            window.location = "/purchase-forecast-to-get-consolidation-benefits/";

                        } else {
                            thisOne.alertWrong = true;
                            thisOne.alertSuccess = false;
                        }
                    }
                );






        }
    }

});