
const register_marque = document.querySelector(".register > .button1");
const register_model = document.querySelector(".register > .button2");


const admining_marque = document.querySelector(".admining_marque");
const admining_model = document.querySelector(".admining_model");

const marque = document.querySelector(".marque");
const model = document.querySelector(".model");


// ENREGISTRER UN NOUVEAU MODEL
register_model.addEventListener("click", () => {
  admining_model.style.display = "block";
});

model.addEventListener("click", () => {
  admining_model.style.display = "none";

});

// ENREGISTRER UNE NOUVELLE MARQUE
register_marque.addEventListener("click", () => {
  admining_marque.style.display = "block";

});

marque.addEventListener("click", () => {
  admining_marque.style.display = "none";

});


