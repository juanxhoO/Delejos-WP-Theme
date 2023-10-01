
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
});
