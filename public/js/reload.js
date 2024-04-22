function reloadPageWithOrWithoutParams(delay) {
    setTimeout(function () {
      // Vérifier s'il y a des paramètres dans l'URL
      if (window.location.search) {
        //get param
        var params = new URLSearchParams(window.location.search);
  
        if (params.has("errors") || params.has("success")) {
          // Récupérer l'URL actuelle
          var currentUrl = window.location.href;
  
          // Supprimer les paramètres de l'URL
          var newUrl = currentUrl.split("?")[0];
  
          // Recharger la page avec la nouvelle URL sans les paramètres
          window.location.href = newUrl;
        }
      }
    }, delay);
  }
  
  // Appeler la fonction avec un délai de 5000 millisecondes (5 secondes)
  reloadPageWithOrWithoutParams(5000);
  