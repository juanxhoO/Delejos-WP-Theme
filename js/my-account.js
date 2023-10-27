document.addEventListener("DOMContentLoaded", function () {
    console.log("lee");
    // This code will run when the DOM is fully loaded
    try {
        let selected_tab = document.querySelector(".woocommerce-MyAccount-navigation a[href='" + location.href + "']")
        selected_tab.classList.add("delejos_active_tab");
    }
    catch (e) {
        console.log(e);
    }
});
