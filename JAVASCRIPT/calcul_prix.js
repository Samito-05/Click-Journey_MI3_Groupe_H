document.addEventListener("DOMContentLoaded", function () {
    const nbrPersonnesInput = document.getElementById("nbr_personnes");
    const dureeSejourInput = document.getElementById("duree_sejour");
    const logementSelect = document.getElementById("logement");
    const pensionInputs = document.getElementsByName("pension");
    const prixEstimeElement = document.getElementById("prix_estime");

    const logementPrices = {
        "Hotel": 75,
        "Hotel++": 100,
        "Auberge": 35,
        "Airbnb": 30
    };

    const pensionPrices = {
        "Sans pension": 0,
        "Demi pension": 15,
        "Pension complète": 30
    };

    const villePrices = {
        "Mont Blanc": 150,
        "Pic du Midi de Bigorre": 150,
        "Puy de Dôme": 150,
        "Dolomites": 250,
        "Monte Rosa": 250,
        "Mont Etna": 250,
        "default": 1000
    };

    function calculatePrice() {
        const nbrPersonnes = parseInt(nbrPersonnesInput.value) || 1;
        const dureeSejour = parseInt(dureeSejourInput.value) || 1;
        const logement = logementSelect.value;
        const pension = Array.from(pensionInputs).find(input => input.checked)?.value || "Sans pension";
        const ville = document.getElementById("ville").value;

        let cout = 0;

        // Add logement cost
        cout += logementPrices[logement] || 0;

        // Add pension cost
        cout += pensionPrices[pension] || 0;

        // Multiply by duration
        cout *= dureeSejour;

        // Add ville cost
        cout += villePrices[ville] || villePrices["default"];

        // Multiply by number of participants
        cout *= nbrPersonnes;

        // Update the displayed price
        prixEstimeElement.textContent = `${cout} €`;
    }

    nbrPersonnesInput.addEventListener("input", calculatePrice);
    dureeSejourInput.addEventListener("input", calculatePrice);
    logementSelect.addEventListener("change", calculatePrice);
    pensionInputs.forEach(input => input.addEventListener("change", calculatePrice));
    document.getElementById("ville").addEventListener("change", calculatePrice);

    calculatePrice();
});