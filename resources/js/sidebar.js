document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll(".nav-toggle");

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", () => {
        console.log("clicked!");

        const menu = toggle.nextElementSibling;
        if (menu && menu.classList.contains('nav-menu')) 
        {
          menu.classList.toggle('hidden');
        }
      })
    })
});
