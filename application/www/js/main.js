'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////
$(function(){

    $('.notice').fadeIn().delay(3000).fadeOut('slow');

    if( $('form').length > 0 ){
        var formValidator = new FormValidator();
        formValidator.run();
    }
});