

new Vue({
    el: '#vueApp',
    data: {
        popupVisiblity: false
    },
    methods: {
        showPopup(){
            this.popupVisiblity = true;
        },
        hidePopup(){
            this.popupVisiblity = false;
        }
    }

});