document.addEventListener("DOMContentLoaded", () => {

  const toggeMenu = document.querySelector('.toggle-menu');
  const menu = document.querySelector('.menu');

  toggeMenu.addEventListener("click",  () => {
    console.log("Cliked!")
    menu.classList.toggle('hidden');
  })

});