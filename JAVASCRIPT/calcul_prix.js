document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form[action="../php/paiement.php"]');
    const prixEstimeElement = document.getElementById("prix_estime");

    async function calculatePrice() {
        const formData = new FormData(form);
        const response = await fetch("../php/calcul_prix_ajax.php", {
            method: "POST",
            body: formData
        });
        const data = await response.json();
        prixEstimeElement.textContent = `${data.cout} €`;
        // Met à jour aussi le champ caché "cout" pour l'envoi du formulaire
        const coutInput = form.querySelector('input[name="cout"]');
        if (coutInput) coutInput.value = data.cout;
    }

    // Sur tous les changements d'options du formulaire
    form.addEventListener("change", calculatePrice);

    // Calcul initial
    calculatePrice();
});