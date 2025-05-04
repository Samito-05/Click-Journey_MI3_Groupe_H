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
