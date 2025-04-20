function changerTheme() {
    const link = document.getElementById("theme-link"); // on récupère le <link>
    const themeActuel = link.getAttribute("href"); // on regarde le thème actuel
  
    console.log("Thème actuel :", themeActuel);
  
    if (themeActuel === "style.css") {
      link.setAttribute("href", "sombre.css");
      document.cookie = "theme=sombre";
        alert("Thème sombre activé !");
      console.log("➡️ Passage en thème sombre");
    } else {
      link.setAttribute("href", "style.css");
      document.cookie = "theme=clair";
      alert("Thème clair activé !");
      console.log("➡️ Retour au thème clair");
    }
  }
  
  // Fonction utilitaire pour lire un cookie
  function getCookie(nom) {
    const cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
      const [cle, valeur] = cookies[i].split("=");
      if (cle === nom) return valeur;
    }
    return null;
  }
  
  // Au chargement de la page, on applique le bon thème depuis le cookie
  window.onload = function () {
    const theme = getCookie("theme");
    const link = document.getElementById("theme-link");
  
    console.log("🌍 Thème détecté dans les cookies :", theme);
  
    if (theme === "sombre") {
      link.setAttribute("href", "sombre.css");
      console.log("✅ Thème sombre appliqué");
    } else {
      link.setAttribute("href", "style.css");
      console.log("✅ Thème clair appliqué (défaut)");
    }
  };
  