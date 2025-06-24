  const logoutLink = document.getElementById('logout-link');
  const logoutForm = document.getElementById('logout-form');

  logoutLink.addEventListener('click', (event) => {
    event.preventDefault(); // Evita que el enlace redirija
    logoutForm.submit(); // Envía el formulario
  });