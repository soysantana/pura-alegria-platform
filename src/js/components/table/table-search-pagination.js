document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('input[placeholder="Search..."]');
    const rows = Array.from(document.querySelectorAll("tbody tr"));
    const paginationContainer = document.getElementById("pagination-container");

    if (!searchInput || !paginationContainer || rows.length === 0) return;

    const rowsPerPage = 10;
    let currentPage = 1;

    // --- FUNCIONES PRINCIPALES ---

    function renderTable() {
        const term = searchInput.value.toLowerCase();
        const filteredRows = rows.filter(row => row.textContent.toLowerCase().includes(term));

        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        if (currentPage > totalPages) currentPage = totalPages || 1;

        rows.forEach(row => row.style.display = "none");

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        filteredRows.slice(start, end).forEach(row => row.style.display = "");

        renderPagination(totalPages);
    }

    function renderPagination(totalPages) {
        paginationContainer.innerHTML = "";

        // 🡸 Botón "Previous"
        const prevBtn = document.createElement("button");
        prevBtn.innerHTML = `
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20">
        <path fill-rule="evenodd" clip-rule="evenodd" 
          d="M2.583 9.998c0 .193.073.385.219.532l4.997 5.001a.75.75 0 1 0 1.06-1.06L5.14 10.747h11.528a.75.75 0 0 0 0-1.5H5.145l3.986-3.717a.75.75 0 0 0-1.06-1.06L2.842 9.43A.75.75 0 0 0 2.583 9.998Z"></path>
      </svg>
      <span class="hidden sm:inline"> Anterior </span>
    `;
        prevBtn.className = "text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 sm:px-3.5 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200";
        prevBtn.disabled = currentPage === 1;
        if (prevBtn.disabled) prevBtn.classList.add("opacity-50", "cursor-not-allowed");
        prevBtn.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        paginationContainer.appendChild(prevBtn);

        // 📄 Indicador móvil ("Page X of Y")
        const spanMobile = document.createElement("span");
        spanMobile.className = "block text-sm font-medium text-gray-700 sm:hidden dark:text-gray-400";
        spanMobile.textContent = `Page ${currentPage} of ${totalPages || 1}`;
        paginationContainer.appendChild(spanMobile);

        // 🔢 Números de página
        const ul = document.createElement("ul");
        ul.className = "hidden items-center gap-0.5 sm:flex";
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            const a = document.createElement("a");
            a.href = "#";
            a.textContent = i;
            a.className =
                "text-theme-sm flex h-10 w-10 items-center justify-center rounded-lg font-medium " +
                (i === currentPage ?
                    "bg-brand-500/[0.08] text-brand-500" :
                    "text-gray-700 dark:text-gray-400 hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500");
            a.addEventListener("click", (e) => {
                e.preventDefault();
                currentPage = i;
                renderTable();
            });
            li.appendChild(a);
            ul.appendChild(li);
        }
        paginationContainer.appendChild(ul);

        // 🡺 Botón "Next"
        const nextBtn = document.createElement("button");
        nextBtn.innerHTML = `
      <span class="hidden sm:inline"> Siguiente </span>
      <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M17.4175 9.9986c0 .193-.073.385-.219.532l-4.997 5.001a.75.75 0 1 1-1.06-1.06l3.72-3.724H3.333a.75.75 0 0 1 0-1.5h11.522l-3.714-3.717a.75.75 0 0 1 1.06-1.06l4.957 4.961c.159.137.259.34.259.566Z"></path>
      </svg>
    `;
        nextBtn.className = "text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 sm:px-3.5 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200";
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;
        if (nextBtn.disabled) nextBtn.classList.add("opacity-50", "cursor-not-allowed");
        nextBtn.addEventListener("click", () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        });
        paginationContainer.appendChild(nextBtn);
    }

    // --- EVENTOS ---
    searchInput.addEventListener("input", () => {
        currentPage = 1;
        renderTable();
    });

    renderTable(); // Render inicial
});