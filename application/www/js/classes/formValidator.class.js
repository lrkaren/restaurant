"use strict";

var FormValidator = function(){

};



FormValidator.prototype.run = function(){
    var errorMessage = $('.error-message');
    if(errorMessage.children('p').text().length > 0){
        errorMessage.fadeIn();
    };
};