document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form[action="../php/sejours.php"]'); // <-- Correction ici
    const prixEstimeElement = document.getElementById("prix_estime");

    async function calculatePrice() {
        const formData = new FormData(form);
        const response = await fetch("../php/calcul_prix_ajax.php", {
            method: "POST",
            body: formData
        });
        const data = await response.json();
        prixEstimeElement.textContent = `${data.cout} €`;

        const coutInput = form.querySelector('input[name="cout"]');
        if (coutInput) coutInput.value = data.cout;
    }

    form.addEventListener("change", calculatePrice);

    calculatePrice();
});