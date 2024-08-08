const menu_option = document.querySelectorAll("ul a li");


// MENU DE LA GAUCHE
for (let i = 0; i < menu_option.length; i++) {
  menu_option[i].addEventListener("click", function () {
    let active = document.querySelector(".menu-select");
    active.classList.remove("menu-select");
    this.classList.add("menu-select");
  });
}