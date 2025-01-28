document.querySelectorAll(".slider").forEach((slider) => {
  const btnPrevious = slider.querySelector(".slider__btn--previous");
  const btnNext = slider.querySelector(".slider__btn--next");
  const slidesContainer = slider.querySelector(".slider__images");
  const slides = slider.querySelectorAll(".slider__image");
  const progressBar = slider.querySelector(".slider__progress-bar");

  let currentSlideIndex = 0;

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
    /*     changeProgress(); */
    hideBtns();
  }

  function previousSlide() {
    currentSlideIndex = Math.max(0, currentSlideIndex - 1);
    updateSlidePosition();
    /*     changeProgress(); */
    hideBtns();
  }

  function hideBtns() {
    const visibleSlides = getVisibleSlidesCount();

    if (currentSlideIndex === 0) {
      btnPrevious.setAttribute("disabled", "");
    } else {
      btnPrevious.removeAttribute("disabled");
    }

    if (currentSlideIndex >= slides.length - visibleSlides) {
      btnNext.setAttribute("disabled", "");
    } else {
      btnNext.removeAttribute("disabled");
    }
  }

  /*   function changeProgress() {
    const visibleSlides = getVisibleSlidesCount();
    const progressValue =
      ((currentSlideIndex + visibleSlides) / slides.length) * 100;
    progressBar.style.width = Math.min(progressValue, 100) + "%";
  } */

  btnPrevious.addEventListener("click", () => {
    previousSlide();
  });

  btnNext.addEventListener("click", () => {
    nextSlide();
  });

  window.addEventListener("resize", () => {
    updateSlidePosition();
    hideBtns();
  });

  hideBtns();
  /*   changeProgress(); */
  updateSlidePosition();
});
