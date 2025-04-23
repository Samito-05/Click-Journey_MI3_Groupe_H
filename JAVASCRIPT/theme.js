function changerTheme() {
  const link = document.getElementById("theme-link");
  const themeActuel = link.getAttribute("href"); // Récupère le chemin actuel du thème

  // Récupère nom du fichier CSS sans son dossier (clair.css ou sombre.css)
  const fichierTheme = themeActuel.split("/").pop();

  // Chemin du dossier contenant les thèmes
  const dossier = "themes/";

  if (fichierTheme === "clair.css") {
    link.setAttribute("href", dossier + "sombre.css"); // Change le lien vers le fichier sombre.css
    document.cookie = "theme=sombre"; // Crée un cookie pour le thème sombre
    alert("Thème sombre activé !"); // Alerte pour informer l'utilisateur
  } else {
    link.setAttribute("href", dossier + "clair.css");
    document.cookie = "theme=clair";
    alert("Thème clair activé !");
  }
}

// Fonction pour lire un cookie
function getCookie(nom) {
  const cookies = document.cookie.split("; "); // Sépare les cookies par un "; "
  
  for (let i = 0; i < cookies.length; i++) { 
    const [cle, valeur] = cookies[i].split("="); // Sépare le nom et la valeur du cookie
    if (cle === nom){
      return valeur; 
    }
  }
  return null;
}

// Au chargement de la page, on applique le thème depuis le cookie
window.onload = function () {
  const theme = getCookie("theme"); // Récupère le cookie "theme"
  const link = document.getElementById("theme-link"); 

  // Chemin du dossier contenant les thèmes
  const dossier = "themes/";

  if (theme === "sombre") {
    link.setAttribute("href", dossier + "sombre.css");
  } else {
    link.setAttribute("href", dossier + "clair.css");
  }
};
