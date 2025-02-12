document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("custom-modal");
    let closeModal = document.querySelector(".close-modal");
    let newsletterButton = document.querySelector(".modal-newsletter-button");

    if (localStorage.getItem("modalClosed") === "true") {
        return;
    }

    if (modal) {

        setTimeout(function () {
            modal.classList.add("active");
        }, 5000);

        function fermerModal() {
            modal.classList.remove("active");
            console.log("Fermeture du modal.");
            localStorage.setItem("modalClosed", "true");
        }

        closeModal.addEventListener("click", fermerModal);

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                fermerModal();
            }
        });

        newsletterButton.addEventListener("click", function (event) {
            event.preventDefault();
            let link = this.getAttribute("href");
            if (link) {
                window.open(link, "_blank");
            }
            fermerModal();
        });
    } else {
        console.warn("Le modal n'existe pas dans le DOM !");
    }
});
