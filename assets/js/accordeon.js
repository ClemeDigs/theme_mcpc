document.addEventListener("DOMContentLoaded", function () {
    const accordions = document.querySelectorAll(".accordeon__header");

    accordions.forEach(button => {
        button.addEventListener("click", function () {
            const content = this.nextElementSibling;
            const icon = this.querySelector(".accordeon__icon");

            content.classList.toggle("accordeon__content--active");

            if (content.classList.contains("accordeon__content--active")) {
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
            } else {
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
            }
        });
    });
});