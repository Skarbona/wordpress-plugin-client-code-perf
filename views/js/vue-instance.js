

new Vue({
    el: '#vueApp',
    data: {
        popupVisiblity: false,
        date: '2019-02-09',
        probability: 'low',
        quantity: '1-10',
        userID: document.querySelector('#userID').value,
        productID: document.querySelector('#productID').value,
        postData: {}

    },
    methods: {
        showPopup(){
            this.popupVisiblity = true;
        },
        hidePopup(){
            this.popupVisiblity = false;
        },
        onSubmit() {

            jQuery(function($) {

                
                this.postData = {
                    date,
                    probability,
                    quantity,
                    userID,
                    productID
                };

                $.post(
                    ajax_object.ajax_url,
                    {
                        'action': 'foobar',
                        'foobar_id':   123
                    },
                    function(response) {
                       alert(response);
                    }
                );



            });


        }
    }

});