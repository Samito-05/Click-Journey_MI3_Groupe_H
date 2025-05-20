function attente(button) {
    const form = button.closest('form');
    const select = form.querySelector('select');
    const selectedOption = select.options[select.selectedIndex];

    selectedOption.textContent = "Veuillez patienter...";
    button.disabled = true;
    select.disabled = true;

    setTimeout(() => {
        button.disabled = false;
        select.disabled = false;
        form.submit();
    }, 2500);
}

function modif_info(event, form) {
    event.preventDefault();

    const button = form.querySelector('button[type="submit"]');
    const loader = form.querySelector('.loader');
    const select = form.querySelector('select');

    const formData = new FormData(form);

    button.disabled = true;
    select.disabled = true;
    loader.style.display = 'inline';

    fetch('../php/update_status.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            //alert('Modifications enregistrées avec succès.');
        } else {
            //alert('Erreur : ' + result.message);
        }
    })
    .catch(() => {
        //alert('Une erreur est survenue lors de la mise à jour.');
    })
    .finally(() => {
        button.disabled = false;
        select.disabled = false;
        loader.style.display = 'none';
    });

    return false;
}