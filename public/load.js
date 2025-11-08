window.addEventListener('DOMContentLoaded', () => {
  setTimeout(() => {
    const homeSection = document.getElementById('home');
    if (homeSection) {
      homeSection.scrollIntoView({ behavior: 'smooth' });
    } else {
      console.error("Element with ID 'home' tidak ditemukan.");
    }
  }, 10000);
});