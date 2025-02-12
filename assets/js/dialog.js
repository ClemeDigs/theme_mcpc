window.addEventListener("load", function () {
  if (typeof juicer !== "undefined") {
    setTimeout(() => {
      juicer.relayout(); // Forcer le recalcul de la grille Juicer
    }, 500);
  }
});

// Sélection de toutes les modales et de tous les boutons close
/**
 * @type {HTMLElement[]}
 */
const dialogs = document.querySelectorAll(".dialog");

/**
 * @type {HTMLElement[]}
 */
const btnsClose = document.querySelectorAll(".btn-close");

// Fonction qui ferme la modale en supprimant les attributs 'open' et 'closing' et en retirant l'écouteur d'événement 'animationend'
/**
 * @param {Event} event
 * @returns {void}
 */
function closeDialog(event) {
  const dialog = event.target;
  dialog.removeAttribute("open");
  dialog.removeAttribute("closing");
  dialog.removeEventListener("animationend", closeDialog);
}

// Fonction qui ajoute l'attribut 'closing' à la modale et appelle l'écouteur d'événement 'animationend' pour appeler la fonction closeDialog
/**
 * @param {HTMLElement} dialog
 * @returns {void}
 */
function closingDialog(dialog) {
  dialog.setAttribute("closing", "");
  dialog.addEventListener("animationend", closeDialog);
}

//Ajoute un écouteur d'événement sur la fenêtre pour gérer l'ouverture et la fermeture des modales au clic. Si l'élément cliqué a un attribut 'data-dialog', la fonction recherche la modale correspondante et l'ouvre.
/**
 * @param {MouseEvent} e - L'événement de clic déclenché par l'utilisateur.
 * @returns {void}
 */
window.addEventListener("click", (e) => {
  const target = e.target;
  const dialogSelector = target.getAttribute("data-dialog");

  if (dialogSelector) {
    const dialog = document.querySelector(dialogSelector);

    if (dialog) {
      if (dialog.checkVisibility()) {
        closingDialog(dialog);
      } else {
        dialog.setAttribute("open", "");
      }
    }
  }
});

// Ajout des écouteurs d'événements sur chaque modale pour les fermer au clic à l'extérieur
/**
 * @returns {void}
 */
dialogs.forEach((dialog) => {
  dialog.addEventListener("click", () => {
    closingDialog(dialog);
  });

  // Empêcher la propagation de l'événement clic à l'intérieur de la modale
  /**
   * @type {HTMLElement[]}
   */
  const childrens = dialog.querySelectorAll("& > *");
  childrens.forEach((children) => {
    children.addEventListener("click", (e) => {
      e.stopImmediatePropagation();
    });
  });
});

// Ajout des écouteurs d'événements sur chaque bouton close pour fermer toutes les modales lorsqu'un bouton close est cliqué
/**
 * @returns {void}
 */
btnsClose.forEach((btnClose) => {
  btnClose.addEventListener("click", () => {
    dialogs.forEach((dialog) => {
      closingDialog(dialog);
    });
  });
});
