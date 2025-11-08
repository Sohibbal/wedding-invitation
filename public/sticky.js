document.addEventListener("DOMContentLoaded", function () {
    let navbar = document.querySelector(".mynavbottom");
    let targetSection = document.querySelector(".hide-navbar");

    let observer = new IntersectionObserver(
      function (entries) {
        if (entries[0].isIntersecting) {
          navbar.classList.add("hide-nav"); // Sembunyikan navbar saat masuk section
        } else {
          navbar.classList.remove("hide-nav"); // Tampilkan kembali saat keluar section
        }
      },
      { threshold: 0.1 } // Aktif saat 10% dari section terlihat
    );

    if (targetSection) {
      observer.observe(targetSection);
    }
  });