//Script to Check if Password and Confirm Passwods Fields matches
jQuery(document).ready(function($) {
    $('#reg_password, #reg_confirm_password').on('keyup', function() {
        var password = $('#reg_password').val();
        var confirmPassword = $('#reg_confirm_password').val();

        if (password === confirmPassword) {
            $('#reg_confirm_password').removeClass('woocommerce-invalid');
            $('#reg_confirm_password').addClass('woocommerce-validated');
        } else {
            $('#reg_confirm_password').removeClass('woocommerce-validated');
            $('#reg_confirm_password').addClass('woocommerce-invalid');
        }
    });
});
