
jQuery(document).ready(function ($) {
    $('#country_select').on('change', function () {
        var selectedCountry = $(this).val();
        $('.country-cities').hide(); // Hide all city containers

        if (selectedCountry === 'all') {
            $('.country-cities').show(); // Show all cities if 'All Countries' selected
        } else {
            $('.country-cities[data-country="' + selectedCountry + '"]').show(); // Show cities for the selected country
        }
    });

    jQuery(".delete-city").on("click", delete_city);
    function delete_city() {
        var id = jQuery(this).attr('data-value');
        var data = {
            action: 'delete_city',
            id: id
            // 'whatever': ajax_object.we_value      // We pass php values differently!
        };
        // // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.post(ajax_object.ajax_url, data, function (response) {
            alert('Got this from the server: ' + response);
            location.reload();
        });
    }


    jQuery(".update-city").on("click", update_city);

    function update_city() {
        var id = jQuery(this).attr('data-value');
        var new_price = jQuery(this).siblings('.edit-price').val();

        var data = {
            action: 'update_city',
            id: id,
            new_price: new_price
        };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.post(ajax_object.ajax_url, data, function (response) {
            alert('Got this from the server: ' + response);
            location.reload();
        });
    }
});



