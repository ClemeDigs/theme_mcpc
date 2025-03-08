window.addEventListener("load", function () {
  if (typeof juicer !== "undefined") {
    setTimeout(() => {
      juicer.relayout(); // Forcer le recalcul de la grille Juicer
    }, 500);
  }
});

// Sélection de toutes les modales et de tous les boutons close
const dialogs = document.querySelectorAll(".dialog");
const btnsClose = document.querySelectorAll(".btn-close");

// Fonction qui ferme la modale en supprimant les attributs 'open' et 'closing'
function closeDialog(event) {
  const dialog = event.target;
  dialog.removeAttribute("open");
  dialog.removeAttribute("closing");
  dialog.removeEventListener("animationend", closeDialog);
}

// Fonction qui ajoute l'attribut 'closing' à la modale avant de la fermer
function closingDialog(dialog) {
  dialog.setAttribute("closing", "");
  dialog.addEventListener("animationend", closeDialog);
}

// Gestion de l'ouverture et de la fermeture des modales au clic
window.addEventListener("click", (e) => {
  const target = e.target;
  const dialogSelector = target.getAttribute("data-dialog");

  if (dialogSelector) {
    const dialog = document.querySelector(dialogSelector);

    if (dialog) {
      if (dialog.hasAttribute("open")) {
        closingDialog(dialog);
      } else {
        dialog.setAttribute("open", "");

        // Empêcher la fermeture immédiate en ajoutant un délai avant l'écouteur de fermeture
        setTimeout(() => {
          dialog.dataset.allowClose = "true";
        }, 100);
      }
    }
  }
});

// Ajout des écouteurs d'événements sur chaque modale pour les fermer au clic à l'extérieur
dialogs.forEach((dialog) => {
  dialog.addEventListener("click", (e) => {
    if (dialog.dataset.allowClose === "true") {
      closingDialog(dialog);
    }
  });

  // Empêcher la propagation du clic à l'intérieur de la modale
  const children = dialog.querySelectorAll("*");
  children.forEach((child) => {
    child.addEventListener("click", (e) => {
      e.stopImmediatePropagation();
    });
  });
});

// Ajout des écouteurs d'événements sur chaque bouton close
btnsClose.forEach((btnClose) => {
  btnClose.addEventListener("click", () => {
    dialogs.forEach((dialog) => {
      closingDialog(dialog);
    });
  });
});
