<?php
$id = (int) base64_decode($_GET['id']);
$items = find_by_sql("SELECT * FROM item_infants WHERE infant_id = $id");
$deleteActionUrl = '/src/db/infant/items/delete-item-infant.php?id=' . base64_encode((int)$id);
?>
<form
    id="invoiceForm"
    action="/src/db/infant/items/edit-item-infant.php?id=<?= base64_encode((int)$id); ?>"
    method="POST">
    <div class="row rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-xl font-medium text-gray-800 dark:text-white">
                Destalle del Artículo
            </h2>
        </div>
        <div>
            <div class="border-b border-gray-200 p-4 sm:p-8 dark:border-gray-800">
                <!-- Products Table -->
                <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-800">
                    <div class="custom-scrollbar overflow-x-auto">
                        <table class="min-w-full text-left text-sm text-gray-700 dark:border-gray-800">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr class="border-b border-gray-100 whitespace-nowrap dark:border-gray-800">
                                    <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                        S. No.
                                    </th>
                                    <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                                        Articulo
                                    </th>
                                    <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                        Unidad de medida
                                    </th>
                                    <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                        Cantidad
                                    </th>
                                    <th class="relative px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white dark:divide-gray-800 dark:bg-white/[0.03]">
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400"><?= count_id(); ?></td>
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-800 dark:text-white/90">
                                            <input type="text" name="itemName[]" value="<?= remove_junk(ucfirst($item['name'])); ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                            <input type="text" name="itemUnit[]" value="<?= remove_junk(ucfirst($item['unit_measurement'])); ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                            <div class="w-1/3">
                                                <input type="hidden" name="itemId[]" value="<?= base64_encode((int)$item['id']); ?>">
                                                <input type="number" name="itemQuantity[]" value="<?= $item['quantity']; ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center justify-center">
                                                <svg @click="isDeleteModal = true; deleteId = '<?= base64_encode((int)$item['id']); ?>';" class="hover:fill-error-500 dark:hover:fill-error-500 cursor-pointer fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                    <button id="saveInvoice" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M13.333 16.6666V12.9166C13.333 12.2262 12.7734 11.6666 12.083 11.6666L7.91634 11.6666C7.22599 11.6666 6.66634 12.2262 6.66634 12.9166L6.66635 16.6666M9.99967 5.83325H6.66634M15.4163 16.6666H4.58301C3.89265 16.6666 3.33301 16.1069 3.33301 15.4166V4.58325C3.33301 3.8929 3.89265 3.33325 4.58301 3.33325H12.8171C13.1483 3.33325 13.4659 3.46468 13.7003 3.69869L16.2995 6.29384C16.5343 6.52832 16.6662 6.84655 16.6662 7.17841L16.6663 15.4166C16.6663 16.1069 16.1066 16.6666 15.4163 16.6666Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>