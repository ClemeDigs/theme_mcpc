document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("galleryModal");
  const modalImg = document.querySelector(".modal__image");
  const closeBtn = document.querySelector(".modal__close");
  const prevBtn = document.querySelector(".modal__arrow--prev");
  const nextBtn = document.querySelector(".modal__arrow--next");
  const galleryItems = document.querySelectorAll(".gallery__item img");
  let currentIndex = 0;

  galleryItems.forEach((item, index) => {
    item.addEventListener("click", () => {
      modal.classList.remove("hidden");
      modal.classList.add("visible");
      modalImg.src = item.src;
      currentIndex = index;
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      modal.classList.remove("visible");
      modal.classList.add("hidden");
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      currentIndex =
        currentIndex > 0 ? currentIndex - 1 : galleryItems.length - 1;
      modalImg.src = galleryItems[currentIndex].src;
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      currentIndex =
        currentIndex < galleryItems.length - 1 ? currentIndex + 1 : 0;
      modalImg.src = galleryItems[currentIndex].src;
    });
  }

  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.classList.remove("visible");
      modal.classList.add("hidden");
    }
  });
});
