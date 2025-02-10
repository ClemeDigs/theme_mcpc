document.querySelectorAll(".slider").forEach((slider) => {
  // Cible uniquement les éléments à l'intérieur du slider actuel
  const btnPrevious = slider.querySelector(
    ":scope > .slider__btn--previous, :scope > .slider__title .slider__btn--previous"
  );
  const btnNext = slider.querySelector(
    ":scope > .slider__btn--next, :scope > .slider__title .slider__btn--next"
  );
  const slidesContainer = slider.querySelector(":scope > .slider__images");
  const slides = slider.querySelectorAll(
    ":scope > .slider__images > .slider__image, :scope > .slider__images > .slider__item"
  );
  const progressBar = slider
    .closest(".slider")
    .parentElement.querySelector(".slider__progress-bar");

  let currentSlideIndex = 0;

  // Vérifie si le slider contient des images
  if (slides.length === 0) return;

  function getVisibleSlidesCount() {
    const containerWidth = slidesContainer.offsetWidth;
    const slideWidth = slides[0].offsetWidth;
    return Math.floor(containerWidth / slideWidth);
  }

  function updateSlidePosition() {
    const slideWidth = slides[0].offsetWidth;
    slidesContainer.scrollTo({
      left: slideWidth * currentSlideIndex,
      behavior: "smooth",
    });
  }

  function nextSlide() {
    const visibleSlides = getVisibleSlidesCount();
    currentSlideIndex = Math.min(
      slides.length - visibleSlides,
      currentSlideIndex + 1
    );
    updateSlidePosition();
    changeProgress();
    hideBtns();
  }

  function previousSlide() {
    currentSlideIndex = Math.max(0, currentSlideIndex - 1);
    updateSlidePosition();
    changeProgress();
    hideBtns();
  }

  function hideBtns() {
    const visibleSlides = getVisibleSlidesCount();

    if (currentSlideIndex === 0) {
      btnPrevious?.setAttribute("disabled", "");
    } else {
      btnPrevious?.removeAttribute("disabled");
    }

    if (currentSlideIndex >= slides.length - visibleSlides) {
      btnNext?.setAttribute("disabled", "");
    } else {
      btnNext?.removeAttribute("disabled");
    }
  }

  function changeProgress() {
    if (!progressBar) return; // Vérifie si progressBar existe

    const visibleSlides = getVisibleSlidesCount();
    const totalSlides = slides.length;
    const maxScrollIndex = totalSlides - visibleSlides; // Dernière position atteignable

    // Calcul de la progression en fonction du défilement total possible
    const progressValue = (currentSlideIndex / maxScrollIndex) * 100;

    // Appliquer la progression en limitant à 100%
    progressBar.style.width = Math.min(progressValue, 100) + "%";
  }

  // Ajoute les écouteurs d'événements
  btnPrevious?.addEventListener("click", previousSlide);
  btnNext?.addEventListener("click", nextSlide);

  // Réagit au redimensionnement de la fenêtre
  window.addEventListener("resize", () => {
    updateSlidePosition();
    hideBtns();
    changeProgress();
  });

  // Initialisation
  changeProgress();
  hideBtns();
  updateSlidePosition();
});
