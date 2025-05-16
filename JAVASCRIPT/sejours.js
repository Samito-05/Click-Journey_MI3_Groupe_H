document.addEventListener('DOMContentLoaded', async function() {
    const ville = document.querySelector('input[name="ville"]')?.value;
    const nbrJours = parseInt(document.querySelector('input[name="duree_sejour"]')?.value, 10);

    if (!ville || !nbrJours) return;

    const response = await fetch('../php/get_options.php', {
        method: 'POST',
        body: new URLSearchParams({ ville })
    });
    const options = await response.json();

    const container = document.getElementById('options-container');
    let html = '<table class="table_sejours">';
    for (let i = 1; i <= nbrJours; i++) {
        html += `<tr>
            <td>Jour ${i}</td>
            <td>
                <select name="option[${i}]">
                    ${options.map(opt => `<option value="${opt}">${opt}</option>`).join('')}
                </select>
            </td>
        </tr>`;
    }
    html += '</table>';
    container.innerHTML = html;
});