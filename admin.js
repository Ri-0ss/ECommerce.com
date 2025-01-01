function showTable(tableId) {
    // Get all table cards
    const tables = document.querySelectorAll('.dashboard-card');

    // Loop through all table cards and toggle visibility
    tables.forEach((table) => {
        table.style.display = table.id === tableId ? 'block' : 'none';
    });

    // Highlight the active link in the sidebar
    const links = document.querySelectorAll('.sidebar a');
    links.forEach((link) => {
        if (link.getAttribute('onclick')?.includes(`showTable('${tableId}')`)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Clear the search input when switching tables
    const searchInput = document.querySelector(`#search-${tableId}`);
    if (searchInput) {
        searchInput.value = '';
    }
}

function searchTable(tableId) {
    const input = document.getElementById(`search-${tableId}`);
    const filter = input ? input.value.toLowerCase() : '';
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');

    // Loop through all table rows and hide those that don't match the search query
    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const cells = rows[i].getElementsByTagName('td');
        let match = false;

        // Check if any cell in the row matches the search query
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].innerText.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }

        rows[i].style.display = match ? '' : 'none'; // Show row if match, else hide
    }
}

// Initialize the dashboard view
document.addEventListener('DOMContentLoaded', () => {
    showTable('dashboard'); // Show the Dashboard table by default
});
