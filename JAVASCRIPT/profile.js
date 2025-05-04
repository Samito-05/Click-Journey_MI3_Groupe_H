let originalValues = {}; // 🔁 allow reassignment

window.addEventListener('DOMContentLoaded', (event) => {
    originalValues = {
        nom: document.getElementById('nom').value,
        prenom: document.getElementById('prenom').value,
        naissance: document.getElementById('naissance').value,
        adresse: document.getElementById('adresse').value,
        mail: document.getElementById('mail').value,
        num: document.getElementById('num').value,
        mdp2: document.getElementById('mdp2').value,
        mdp3: document.getElementById('mdp3').value
    };
});


function deverouiller_input(id) {
    const input = document.getElementById(id);
    input.disabled = !input.disabled;
}

function retour_modif(id) {
    const input = document.getElementById(id);
        input.value = originalValues[id]; 
        input.disabled = true; 
}