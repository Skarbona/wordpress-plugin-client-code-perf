

//Adding ASK FOR PRODUCT BUTTON

var whis = document.querySelector('.tinv-wishlist-clear');

var askButton = document.createElement('button');

askButton.classList.add('ask-button');

whis.appendChild(askButton); //Add Ask before Whis Button
var askLink = document.createElement('a');
askLink.setAttribute('href','mailto:office@perfecta.com.pl');
askLink.innerText = 'Ask for prodcut';
askButton.appendChild(askLink);
console.log(askLink);



//Create DIV and Move elements to it
var mainContainer1 = document.querySelector('.woocommerce-container');
var wooTabs = document.querySelector('.woocommerce-tabs');
var mainContainer = mainContainer1.querySelector('.product');
var extraContainer = document.createElement('div');

extraContainer.classList.add('extra-container');
mainContainer.insertBefore(extraContainer,wooTabs);

//Move 2 first elements on product page, to new DIV to set max-width
jQuery(".avada-single-product-gallery-wrapper").detach().appendTo('.extra-container');
jQuery(".entry-summary").detach().appendTo('.extra-container');

jQuery(".avada-single-product-gallery-wrapper").appendTo('.extra-container');
jQuery(".entry-summary").appendTo('.extra-container');














