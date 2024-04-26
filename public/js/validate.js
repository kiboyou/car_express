document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('marqueForm').addEventListener('submit', function(event) {
      event.preventDefault;

      //validate form
      let marqueIN = document.getElementById('marque');
      let marqueVAL = marqueIN.value.trim();
      if (marqueVAL === "") {
        alert("Le champ marque ne peut être vide.");
        marqueIN.focus();
        return;
      }

      this.submit();

    });
  });
  document.addEventListener("DOMContentLoaded", function() {
    let marqueSelect = document.getElementById("marqueSelect");
    let modeleIN = document.getElementById('modele');

    marqueSelect.addEventListener("change", function() {
      if (marqueSelect.value !== "") {
        modeleIN.removeAttribute("disabled")
      } else {
        modeleIN.setAttribute("disabled", "disabled");
        modeleIN.value = "";
      }
    });

    document.getElementById('modeleForm').addEventListener("submit", function(event) {
      let modelVal = modeleIN.value.trim();
      if (marqueSelect.value === "") {
        event.preventDefault();
        alert("Veuillez choisir une marque")
      }
      if (modelVal === "") {
        event.preventDefault();
        alert("Veuillez saisir un modele");
      }
    })
  })