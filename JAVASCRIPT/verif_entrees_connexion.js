window.addEventListener('DOMContentLoaded', () => {
    const email = document.getElementById('email');
    const mdp = document.getElementById('mdp_connexion');
    const btn = document.getElementById('btn_connexion');

    btn.disabled = true;

    function validateEmail(emailValue) {
        return emailValue.includes('@') && emailValue.includes('.');
    }

    function validatePassword(passwordValue) {
        return passwordValue.length >= 3 && passwordValue.length <= 20;
    }

    function validateInputs() {
        const isEmailValid = validateEmail(email.value.trim());
        const isPasswordValid = validatePassword(mdp.value.trim());
        btn.disabled = !(isEmailValid && isPasswordValid);
    }

    email.addEventListener("input", validateInputs);
    mdp.addEventListener("input", validateInputs);
});
