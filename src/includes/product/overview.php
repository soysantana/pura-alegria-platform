<?php
$total_invested = find_by_sql("SELECT SUM(price * quantity_product) AS total FROM products;")[0]['total'];
$total_consumable = find_by_sql("SELECT SUM(price * quantity_product) AS total FROM products WHERE type_product = 'consumible';")[0]['total'];
$total_non_consumable = find_by_sql("SELECT SUM(price * quantity_product) AS total FROM products WHERE type_product = 'no consumible';")[0]['total'];
$inventory_value = find_by_sql("SELECT SUM(price * quantity_product) AS total FROM products WHERE status = 'En Stock';")[0]['total'];
?>

<div class="mb-6 rounded-2xl border border-gray-200 bg-white p-4 sm:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="font-semibold text-gray-800 dark:text-white/90">
                Descripción general
            </h2>
        </div>
        <div>
            <a href="/products-add" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Agregar Producto
            </a>
        </div>
    </div>
    <div class="grid grid-cols-1 rounded-xl border border-gray-200 sm:grid-cols-2 lg:grid-cols-4 lg:divide-x lg:divide-y-0 dark:divide-gray-800 dark:border-gray-800">
        <div class="border-b p-5 sm:border-r lg:border-b-0">
            <p class="mb-1.5 text-sm text-gray-400 dark:text-gray-500">
                Total invertido
            </p>
            <h3 class="text-3xl text-gray-800 dark:text-white/90">
                RD$ <?= number_format($total_invested ?? 0, 2) ?>
            </h3>
        </div>
        <div class="border-b p-5 lg:border-b-0">
            <p class="mb-1.5 text-sm text-gray-400 dark:text-gray-500">
                Total en consumibles
            </p>
            <h3 class="text-3xl text-gray-800 dark:text-white/90">
                RD$ <?= number_format($total_consumable ?? 0, 2) ?>
            </h3>
        </div>
        <div class="border-b p-5 sm:border-r sm:border-b-0">
            <p class="mb-1.5 text-sm text-gray-400 dark:text-gray-500">
                Total en no consumibles
            </p>
            <h3 class="text-3xl text-gray-800 dark:text-white/90">
                RD$ <?= number_format($total_non_consumable ?? 0, 2) ?>
            </h3>
        </div>
        <div class="p-5">
            <p class="mb-1.5 text-sm text-gray-400 dark:text-gray-500">
                Valor actual del inventario
            </p>
            <h3 class="text-3xl text-gray-800 dark:text-white/90">
                RD$ <?= number_format($inventory_value ?? 0, 2) ?>
            </h3>
        </div>
    </div>
</div>