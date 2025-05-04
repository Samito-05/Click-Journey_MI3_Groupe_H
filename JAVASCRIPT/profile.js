const originalValues = {
    nom: og_nom.value,
    prenom: og_prenom.value,
    naissance: og_naissance.value,
    adresse: og_adresse.value,
    mail: og_email.value,
    num: og_numero.value,
    mdp2: og_mdp.value,
    mdp3: og_verif_mdp.value
};

function deverouiller_input(id) {
    const input = document.getElementById(id);
    input.disabled = !input.disabled;
}

function retour_modif(id) {
    const input = document.getElementById(id);
    if (input) {
        input.value = originalValues[id];
        input.disabled = true;
    }
}