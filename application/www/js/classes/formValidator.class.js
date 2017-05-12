"use strict";

var FormValidator = function(){

};

FormValidator.prototype.checkTypes = function(){
    var type;
    var value;
    var name;

    $('[data-type]').each(function(){
       type  = $(this).data('type');
       value = $(this).val();
       name  = $(this).data('name');

        switch(type){

            case 'password':
                //password must be 6 (1 uppercase letter, 1 special character and alphanumeric characters?
                if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/.test(value) == false){
                    console.log('le champ '+name+' faire 6 caractère minimum et contenir au moins une majuscule, minuscule et caractère spécial' )
                }
                break;
            case 'email':
               if(/^[\w.-]+@[\w.-]+.\D{2,}$/.test(value) == false){
                   // console.log('le champ '+name+' doit être au format nom@domaine.com' )
                }
               break;

           case 'phone':
               if(/^\+?[0-9.-]{8,20}$/.test(value) === false){
                   // console.log('le champ '+name+' doit respecter le format téléphonique' )
               }
               break;

           case 'number':
               if(!isNumber(value)){
                  // console.log('le champ '+ name +' ne doit être un nombre')
               }
               break;
       }
    })
};

FormValidator.prototype.checkRequired = function(){
    var name;

    $('[data-required]').each(function(){
        if($(this).val().length == 0){
            name = this.dataset.name;
           //todo :  console.log('le champ '+ name +' ne doit pas être vide');
        }
    })
};

FormValidator.prototype.checkMinimumLength = function() {
    var name;
    var minLength;

    $('[data-minimumLength]').each(function(){

        name = this.dataset.name;
        minLength = this.dataset['minimumlength'];

        if(this.value.length < minLength){
            //todo : console.log('La longueur minimum du champ '+name+' est de '+minLength);
        }

    })
};


FormValidator.prototype.onSubmitForm = function(event){
    this.checkMinimumLength();
    this.checkRequired();
    this.checkTypes();

    // todo : gérer les erreurs ici au lieu d'un console log pourrave

   // event.preventDefault();
};

FormValidator.prototype.run = function(){

    $('form').submit(this.onSubmitForm.bind(this));

    var errorMessage = $('.error-message');
    if(errorMessage.children('p').text().length > 0){
        errorMessage.fadeIn();
    };
};