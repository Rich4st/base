document.onreadystatechange = function () {
  if (document.readyState == "complete") {
    const menu = document.querySelector('#my-drawer')

    menu.addEventListener('change', function () {
      document.body.classList.toggle('overflow-hidden')

    })

    if (Swiper) {
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }
  }
}

