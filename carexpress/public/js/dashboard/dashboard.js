const register = document.querySelector(".register > button");
const admining = document.querySelector(".admining");
const canceladmining = document.querySelector(".admining > .admining-cancel");

const lost = document.querySelectorAll(".lost");
const deleteadmin = document.querySelector(".delete");
const cancelDelete = document.querySelector(".delete-cancel");

const deladmin = document.querySelectorAll(".del");
const warning = document.querySelector(".delete");
const cancelDel = document.querySelector(".delete-cancel");

const menu_option = document.querySelectorAll("ul a li");

const voiture = document.querySelector("#voiture");
const menu_voiture = document.querySelector("#menu-voiture");

// my update
// const editButtons = document.querySelectorAll(".set");
// const editModal = document.querySelector("#editModal");
// const editForm = document.querySelector("#editForm");
// const cancelEdit = document.querySelector(".admining-cancel");

// editButtons.forEach((button) => {
//     button.addEventListener("click", (e) => {
//         e.preventDefault();
//         const carId = button.getAttribute("data-id");
//         // Vous pouvez utiliser carId pour récupérer les données de la voiture et les remplir dans le formulaire
//         editForm.action = `/vehicule/${carId}`;
//         editModal.style.display = "block";
//     });
// });
// canceladmining.addEventListener("click", () => {
//     editModal.style.display = "none";
// });

//end for me

// MENU DE LA GAUCHE
for (let i = 0; i < menu_option.length; i++) {
    menu_option[i].addEventListener("click", function (e) {
        let active = document.querySelector(".menu-select");
        active.classList.remove("menu-select");
        this.classList.add("menu-select");
        console.log(e.target);
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

const menu_option_voiture = document.querySelectorAll("#menu-voiture a li");

// MENU DE LA GAUCHE
for (let i = 0; i < menu_option_voiture.length; i++) {
    menu_option_voiture[i].addEventListener("click", function () {
        menu_voiture.style.display = "block";
        let active = document.querySelector(".menu-select");
        active.classList.remove("menu-select");
        this.classList.add("menu-select");
    });
}

// TOGGLE menu-voiture

voiture.addEventListener("click", (e) => {
    e.preventDefault();
    if (menu_voiture.style.display == "none") {
        menu_voiture.style.display = "block";
    } else {
        menu_voiture.style.display = "none";
    }
});
