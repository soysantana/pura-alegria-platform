<?php
$id = (int) base64_decode($_GET['id']);
$product = find_by_sql("SELECT prod.*, cat1.name AS category_name, cat2.name AS brand_name FROM products AS prod INNER JOIN categories AS cat1 ON prod.category = cat1.id INNER JOIN categories AS cat2 ON prod.brand = cat2.id WHERE prod.id = '{$id}' LIMIT 1;");
if ($product) {
    $prod = $product[0];
}
?>

<div class="space-y-6">
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                Desccripción del producto
            </h2>
        </div>
        <div class="p-4 sm:p-6 dark:border-gray-800">
            <form
                action="/src/db/product/edit-product.php?id=<?= base64_encode((int)$prod['id']); ?>"
                method="POST"
                enctype="multipart/form-data">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="productName" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nombre del producto
                        </label>
                        <input
                            type="text"
                            id="productName"
                            name="productName"
                            value="<?= remove_junk($prod['name']); ?>"
                            required
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            placeholder="Introduzca el nombre del producto">
                    </div>
                    <div>
                        <?php $categories = find_by_sql("SELECT id, name, status FROM categories WHERE status = 'C' ORDER BY id ASC"); ?>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Categoría
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select
                                id="productCategory"
                                name="productCategory"
                                required
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    Seleccionar categoría
                                </option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= (int)$cat['id']; ?>"
                                        <?= $cat['id'] == $prod['category'] ? 'selected' : ''; ?>>
                                        <?= remove_junk($cat['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div>
                        <?php $brands = find_by_sql("SELECT id, name, status FROM categories WHERE status = 'B' ORDER BY id ASC"); ?>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Marca
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select
                                id="productBrand"
                                name="productBrand"
                                required
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    Seleccionar marca
                                </option>
                                <?php foreach ($brands as $brand): ?>
                                    <option value="<?= (int)$brand['id']; ?>"
                                        <?= $brand['id'] == $prod['brand'] ? 'selected' : ''; ?>>
                                        <?= remove_junk($brand['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Tipo de Producto
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select
                                id="productType"
                                name="productType"
                                required
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    Seleccionar tipo de producto
                                </option>
                                <option <?php if ($prod['type_product'] == 'Consumible') echo 'selected'; ?> value="Consumible" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    Consumible
                                </option>
                                <option <?php if ($prod['type_product'] == 'No consumible') echo 'selected'; ?> value="No consumible" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    No consumible
                                </option>
                            </select>
                            <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                            <div>
                                <label for="productUnitMeasurement" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Unidad de medida</label>
                                <input value="<?= remove_junk($prod['unit_measurement']); ?>" type="text" name="productUnitMeasurement" id="productUnitMeasurement" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="ej. paquete, litro, unidad, caja...">
                            </div>
                            <div>
                                <label for="productAmount" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Cantidad actual</label>
                                <input value="<?= (int)$prod['quantity_product']; ?>" type="number" name="productAmount" id="productAmount" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Introduzca la cantidad actual del producto">
                            </div>
                            <div>
                                <label for="productPrice" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Precio</label>
                                <input value="<?= number_format((float)remove_junk($prod['price']), 2, '.', ''); ?>" type="number" step="0.01" name="productPrice" id="productPrice" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Introduzca el precio del producto">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Observaciones
                        </label>
                        <textarea placeholder="Observaciones del producto (opcional)" type="text" name="Productobservations" id="Productobservations" rows="7" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full resize-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"><?= remove_junk($prod['observations']); ?></textarea>
                    </div>
                </div>

        </div>
    </div>
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                Disponibilidad
            </h2>
        </div>
        <div class="space-y-5 p-4 sm:p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="productMinimumQuantity" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Cantidad minima</label>
                    <input value="<?= (int)$prod['minimum_quantity']; ?>" type="number" name="productMinimumQuantity" id="productMinimumQuantity" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Introduzca la cantidad minima del producto">
                </div>
                <div>
                    <label for="productExpirationDate" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Fecha de vencimiento (si aplica)</label>
                    <input value="<?= remove_junk($prod['expiration_date']); ?>" type="date" name="productExpirationDate" id="productExpirationDate" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="productLocation" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Ubicación/Almacén</label>
                    <input value="<?= remove_junk($prod['location']); ?>" type="text" name="productLocation" id="productLocation" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="ej. depósito, cocina, aula...">
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Estado de disponibilidad
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select
                            name="productStatus"
                            id="productStatus"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                Seleccionar Estado de Disponibilidad
                            </option>
                            <option <?php if ($prod['status'] == 'En Stock') echo 'selected'; ?> value="En Stock" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                En Stock
                            </option>
                            <option <?php if ($prod['status'] == 'Agotado') echo 'selected'; ?> value="Agotado" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                Agotado
                            </option>
                        </select>
                        <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                Imagen del producto
            </h2>
        </div>
        <div class="space-y-5 p-4 sm:p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-1">
                <div>
                    <label for="length" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Imagen</label>
                    <input
                        type="file"
                        id="picture"
                        name="picture"
                        accept="image/*"
                        class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400">
                </div>
            </div>
        </div>
    </div>
    <!-- Button -->
    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
        <button class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
            Borrador
        </button>
        <button
            type="submit"
            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
            Guardar Cambios
        </button>
    </div>
</div>
</form>