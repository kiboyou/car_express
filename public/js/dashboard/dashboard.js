const register = document.querySelector(".register > button");
const admining = document.querySelector(".admining");
const canceladmining = document.querySelector(".admining > .admining-cancel");

const lost = document.querySelectorAll(".lost");
const deleteadmin = document.querySelector(".delete");
const cancelDelete = document.querySelector(".delete-cancel");

const deladmin = document.querySelectorAll(".set");
const warning = document.querySelector(".delete");
const cancelDel = document.querySelector(".delete-cancel");

const menu_option = document.querySelectorAll("ul a li");


// MENU DE LA GAUCHE
for (let i = 0; i < menu_option.length; i++) {
  menu_option[i].addEventListener("click", function () {
    let active = document.querySelector(".menu-select");
    active.classList.remove("menu-select");
    this.classList.add("menu-select");
  });
}



// ENREGISTRER UN NOUVEAU CADRE
register.addEventListener("click", () => {
  admining.style.display = "block";
});



canceladmining.addEventListener("click", () => {
  admining.style.display = "none";
});

//

lost.forEach((el) =>
  el.addEventListener("click", () => {
    console.log(el);
    deleteadmin.style.display = "block";
  })
);

cancelDelete.addEventListener("click", () => {
  deleteadmin.style.display = "none";
});


// SUPPRESSION D'UN CADRE
deladmin.forEach((el) =>
  el.addEventListener("click", () => {
    warning.style.display = "block";
  })
);

cancelDel.addEventListener("click", () => {
  warning.style.display = "none";
});

