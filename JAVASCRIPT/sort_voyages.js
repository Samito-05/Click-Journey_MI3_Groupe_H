document.addEventListener("DOMContentLoaded", function () {
    const sortSelect = document.getElementById("sort-select");
    const voyagesList = document.getElementById("voyages-list");

    sortSelect.addEventListener("change", function () {
        const sortValue = sortSelect.value;
        const voyages = Array.from(voyagesList.getElementsByClassName("voyage-item"));

        voyages.sort((a, b) => {
            const distanceA = parseFloat(a.dataset.distance);
            const distanceB = parseFloat(b.dataset.distance);
            const priceA = parseFloat(a.dataset.price);
            const priceB = parseFloat(b.dataset.price);

            switch (sortValue) {
                case "distance-asc":
                    return distanceA - distanceB;
                case "distance-desc":
                    return distanceB - distanceA;
                case "price-asc":
                    return priceA - priceB;
                case "price-desc":
                    return priceB - priceA;
                default:
                    return 0;
            }
        });

        // Reorder the voyages in the DOM
        voyages.forEach(voyage => voyagesList.appendChild(voyage));
    });
});