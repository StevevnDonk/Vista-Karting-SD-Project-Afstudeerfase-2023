const hamburger = document.querySelector('.hamburger');
const navLink = document.querySelector('.nav__link');

// Voeg een eventlistener toe aan de hamburgerknop
hamburger.addEventListener('click', () => {
  navLink.classList.toggle('hide');
});

// Voeg een eventlistener toe aan het document om te controleren op klikken buiten .nav__link
document.addEventListener('click', (event) => {
  if (!navLink.contains(event.target) && !hamburger.contains(event.target)) {
    navLink.classList.add('hide');
  }
});
