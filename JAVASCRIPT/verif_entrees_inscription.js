window.addEventListener('DOMContentLoaded', () => {
    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const naissance = document.getElementById('naissance');
    const adresse = document.getElementById('adresse');
    const numero = document.getElementById('numero');
    const email = document.getElementById('email');
    const mdp = document.getElementById('mdp_inscription');
    const verif_mdp = document.getElementById('mdp_confirm_inscription');
    const btn = document.getElementById('btn_inscription');

    btn.disabled = true;

    function validateEmail(emailValue) {
        return emailValue.includes('@') && emailValue.includes('.');
    }

    function validatePassword(passwordValue) {
        return passwordValue.length >= 3 && passwordValue.length <= 20;
    }

    function validatePhone(phoneValue) {
        return /^\d{10}$/.test(phoneValue);
    }

    function validateTextField(value) {
        return value.trim().length > 0;
    }

    function validateDate(dateValue) {
        const today = new Date();
        const inputDate = new Date(dateValue);
        return inputDate < today;
    }

    function validatePasswordsMatch() {
        return mdp.value.trim() === verif_mdp.value.trim();
    }

    function validateInputs() {
        const isNomValid = validateTextField(nom.value);
        const isPrenomValid = validateTextField(prenom.value);
        const isNaissanceValid = validateDate(naissance.value);
        const isAdresseValid = validateTextField(adresse.value);
        const isNumeroValid = validatePhone(numero.value);
        const isEmailValid = validateEmail(email.value.trim());
        const isPasswordValid = validatePassword(mdp.value.trim());
        const arePasswordsMatching = validatePasswordsMatch();

        btn.disabled = !(
            isNomValid &&
            isPrenomValid &&
            isNaissanceValid &&
            isAdresseValid &&
            isNumeroValid &&
            isEmailValid &&
            isPasswordValid &&
            arePasswordsMatching
        );
    }

    nom.addEventListener("input", validateInputs);
    prenom.addEventListener("input", validateInputs);
    naissance.addEventListener("input", validateInputs);
    adresse.addEventListener("input", validateInputs);
    numero.addEventListener("input", validateInputs);
    email.addEventListener("input", validateInputs);
    mdp.addEventListener("input", validateInputs);
    verif_mdp.addEventListener("input", validateInputs);

    const inputsWithCounts = [
        { input: 'nom', max: 50 },
        { input: 'prenom', max: 50 },
        { input: 'adresse', max: 100 },
        { input: 'numero', max: 10 },
        { input: 'email', max: 50 },
        { input: 'mdp_inscription', max: 20 },
        { input: 'mdp_confirm_inscription', max: 20 }
    ];

    inputsWithCounts.forEach(({ input, max }) => {
        const inputElement = document.getElementById(input);
        const countElement = document.getElementById(`${input}-count`);

        inputElement.addEventListener('input', () => {
            const remaining = max - inputElement.value.length;
            countElement.textContent = remaining;
        });
    });
});
