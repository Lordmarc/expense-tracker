document.addEventListener("DOMContentLoaded", () => {

  const toggeMenu = document.querySelector('.toggle-menu');
  const menu = document.querySelector('.user-login-register');

  toggeMenu.addEventListener("click",  () => {
    console.log("Cliked!")
    menu.classList.toggle('hidden');
  })

});