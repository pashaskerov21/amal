
const hero_Swiper = new Swiper(".hero-section-slider", {
  loop: true,
  navigation: {
    nextEl: ".banner-two__arry-btn .arry-next",
    prevEl: ".banner-two__arry-btn .arry-prev",
  },
  delay: 2000,
  autoplay: {
    delay: 2000,
  },
  slidesPerView: 1,
});
const partners_Swiper = new Swiper(".partner-slider", {
  loop: true,
  speed: 2000,
  delay: 2000,
  dots: true,

  autoplay: {
    delay: 2000,
  },
  slidesPerView: 4,
  margin: 40,

  breakpoints: {
    1700: {
      slidesPerView: 5,
    },
    992: {
      slidesPerView: 4,
    },
    768: {
      slidesPerView: 3,
    },
    576: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});
const blog_Swiper = new Swiper(".blog-slider", {
  loop: true,
  delay: 2000,
  dots: true,
  spaceBetween: 20,
  pagination: {
    el: ".blog-slider .swiper-pagination",
    clickable: true,
    dynamicBullets: true,
    dynamicMainBullets: 4,
  },
  navigation: {
    nextEl: ".blog-section .arry-next",
    prevEl: ".blog-section .arry-prev",
  },
  autoplay: {
    delay: 2000,
  },
  slidesPerView: 3,
  margin: 40,

  breakpoints: {
    1700: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 3,
    },
    700: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});
const info_Swiper = new Swiper(".info-slider", {
  loop: true,
  delay: 2000,
  dots: true,
  spaceBetween: 20,

  autoplay: {
    delay: 2000,
  },
  slidesPerView: 3,
  margin: 40,
  navigation: {
    nextEl: ".info-section .arry-next",
    prevEl: ".info-section .arry-prev",
  },
  breakpoints: {
    1700: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 3,
    },
    700: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});
const team_Swiper = new Swiper(".team-slider", {
  loop: true,
  spaceBetween: 40,
  margin: 30,
  autoplay: {
    delay: 3000,
  },
  slidesPerView: 4,
  margin: 40,
  navigation: {
    nextEl: ".team-area .arry-next",
    prevEl: ".team-area .arry-prev",
  },
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});
