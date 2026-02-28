document.addEventListener("DOMContentLoaded", function () {

    const btn1 = document.getElementById("ctaBtn");
    const btn2 = document.getElementById("ctaBtn2");

    if (btn1) {
        btn1.addEventListener("click", function () {
            alert("Booking feature coming soon!");
        });
    }

    if (btn2) {
        btn2.addEventListener("click", function () {
            alert("Let's get started!");
        });
    }

});