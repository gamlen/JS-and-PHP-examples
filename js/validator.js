require(['jquery'], function($) {
    $(document).ready(function() {

        function validateContactForm() {
            $('.fieldset > .field').each(function( index, value ){
                let inputs = $(this).find('input').val();

                if (inputs === '' || inputs === null) {
                    $(this).find('label').addClass('mage-error');
                } else {
                    $(this).find('label').removeClass('mage-error');
                }

                if($(this).hasClass('email')) {
                    let email = $(this).find($('.email input')).val();

                    if (isEmail(email)) {
                        $(this).find('label').removeClass('mage-error');
                    } else {
                        $(this).find('label').addClass('mage-error');
                    }
                }

                if($(this).hasClass('telephone')) {
                    let telephone = $(this).find($('.telephone input')).val();

                    if (isNumber(telephone) && telephone !== '') {
                        $(this).find('label').removeClass('mage-error');
                    } else {
                        $(this).find('label').addClass('mage-error');
                    }
                }
            });
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function isNumber(phone) {
            var regex = /^\s*-?\d*(\.\d*)?\s*$/;
            return regex.test(phone);
        }

        $('button.submit').click(function() {
            validateContactForm();
        });
    });
});
