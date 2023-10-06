document.getElementById("my_country_field").addEventListener("change", function () {    
    var selected_country = this.value;
    console.log(selected_country);
    var data = {
        action:'fetch_cities',
        country: selected_country
    }
    //Fetching cieties

    jQuery.get(ajax_object.ajax_url, data, function (response) {
        

        var cities = response;

        // illing city with options



        
    




    });
});








