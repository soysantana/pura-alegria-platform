document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('input[placeholder="Search..."]');
    const tableRows = document.querySelectorAll("tbody tr");

    if (!searchInput || tableRows.length === 0) return;

    searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? "" : "none";
        });
    });
});