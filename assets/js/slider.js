const btnPrevious = document.querySelector(".slider__btn--previous");
const btnNext = document.querySelector(".slider__btn--next");
const slidesContainer = document.querySelector(".slider__images");
const slides = document.querySelectorAll(".slider__image");
const progressBar = document.querySelector(".slider__progress-bar");

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
    btnPrevious.classList.add("hidden");
  } else {
    btnPrevious.classList.remove("hidden");
  }

  if (currentSlideIndex >= slides.length - visibleSlides) {
    btnNext.classList.add("hidden");
  } else {
    btnNext.classList.remove("hidden");
  }
}

function changeProgress() {
  const visibleSlides = getVisibleSlidesCount();
  const progressValue =
    ((currentSlideIndex + visibleSlides) / slides.length) * 100;
  progressBar.style.width = Math.min(progressValue, 100) + "%";
}

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
changeProgress();
updateSlidePosition();
