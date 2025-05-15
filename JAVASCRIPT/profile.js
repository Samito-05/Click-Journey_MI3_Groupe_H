let originalValues = {};

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

async function envoyer_modifications() {
    const formData = new FormData(document.querySelector('.form_profile'));
    try {
        const response = await fetch('../php/modif_profile.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('Modifications enregistrées avec succès.');
            Object.keys(originalValues).forEach(key => {
                originalValues[key] = document.getElementById(key).value;
            });
        } else {
            alert('Erreur : ' + result.message);
            Object.keys(originalValues).forEach(key => {
                document.getElementById(key).value = originalValues[key];
            });
        }
    } catch (error) {
        alert('Une erreur est survenue lors de la mise à jour.');
        Object.keys(originalValues).forEach(key => {
            document.getElementById(key).value = originalValues[key];
        });
    }
}