
document.getElementById("delejos_country_selector").addEventListener("change", function () {
    var country_code = this.value;
    //sessionStorage.setItem();

    //Fetching Cities
    var data = {
        action: "fetch_cities",
        country: country_code,
    }

    jQuery.get(ajax_object.ajax_url, data, function (data) {
        //Filling Cities Selector
        var cities = JSON.parse(data);
        console.log(cities);
        populateSelect(cities, "delejos_city_selector");
    });

});

// Function to populate the select element with data
function populateSelect(data, selector) {
    // Preserve the first option ("Select country")
    const selectElement = document.getElementById(selector);

    const firstOption = selectElement.options[0];
    selectElement.innerHTML = ''; // Clear all options except the first one
    selectElement.appendChild(firstOption); // Add back the first option

    // Iterate through the data and create option elements
    data.forEach(item => {
        const option = document.createElement('option');
        option.value = item; // Set the value of the option
        option.text = item;   // Set the text of the option
        selectElement.appendChild(option); // Append the option to the select element
    });
}
//Ocassion Value Selector
document.getElementById("delejos_city_selector").addEventListener("change", function () {

    var country_name = this.value;
    //sessionStorage.setItem()

    //Fetching Cities
});

//Ocassion Value Selector
document.getElementById("delejos_ocasion_selector").addEventListener("change", function () {
    var country_name = this.value;

    //sessionStorage.setItem()
    //Fetching Cities
});

//Ocassion Value Selector
document.getElementById("delejos_homepage_selector_form").addEventListener("submit", function (e) {
    e.preventDefault();
    console.log("form Submitted");
    // Redirectin to the page or something
    data = jQuery("#delejos_homepage_selector_form").serialize();
    console.log(data);

    //checking in all 3 selectors are filled to enable button
});




