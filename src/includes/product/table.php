<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pt-4 pb-3 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
    <div
        class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Lista de Productos
            </h3>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative flex-1 sm:flex-auto">
                <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z" fill=""></path>
                    </svg>
                </span>
                <input type="text" placeholder="Search..." class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden sm:w-[300px] sm:min-w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
            </div>

            <a href="/products-add" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Agregar Producto
            </a>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <!-- table header start -->
            <thead class="border-gray-100 border-y dark:border-gray-800">
                <tr>
                    <th class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Productos
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Categoría
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Marca
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Precio
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Stock
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Creado
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <!-- table body start -->
            <tbody class="py-3 divide-y divide-gray-100 dark:divide-gray-800">
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <div class="flex items-center gap-3">
                                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                    <img src="/src/uploads/product/toilet-paper.jpg" alt="Papel Higiénico" />
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                        Papel Higiénico
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                Higiene y cuidado
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                Scott
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                RD$ 40.00
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                En stock
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                30 Sept 2025
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>

            <!-- table body end -->
        </table>
    </div>
</div>