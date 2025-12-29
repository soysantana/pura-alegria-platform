<?php
$id = (int) base64_decode($_GET['id']);
$inv = find_by_id('invoices', $id);
?>

<form
    id="invoiceForm"
    action="/src/db/invoice/save-invoice.php"
    method="POST">
    <div x-data="billingApp()" class="row rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-xl font-medium text-gray-800 dark:text-white">
                Editar factura <?= remove_junk($inv['receipt_no']); ?>
            </h2>
        </div>
        <div class="border-b border-gray-200 p-4 sm:p-8 dark:border-gray-800">
            <div class="space-y-6">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <input type="hidden" id="receiptNo" name="receiptNo" value="<?= remove_junk($inv['receipt_no']); ?>">
                        <input type="hidden" id="pdfBase64" name="pdfBase64">
                        <label for="tutorName" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nombre del representante legal (padre, madre o tutor)</label>
                        <input type="text" id="tutorName" name="tutorName" value="<?= remove_junk($inv['tutor_name']); ?>" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Escriba el nombre del padre, madre o tutor">
                    </div>
                    <div>
                        <label for="infantName" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nombre del Niño(a)</label>
                        <input type="text" id="infantName" name="infantName" value="<?= remove_junk($inv['infant_name']); ?>" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Escriba el nombre del niño(a)">
                    </div>
                    <div class="col-span-full">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Servicio
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select x-data="{ serviceType: '<?php echo $inv['service_type']; ?>' }" x-model="serviceType" id="serviceType" name="serviceType" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Seleccione el servicio
                                        </option>
                                        <option value="Guarderia" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Guardería
                                        </option>
                                        <option value="Sala de Tareas" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Sala de Tareas
                                        </option>
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
                                    Tanda
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select x-data="{ tanda: '<?php echo $inv['tanda_type']; ?>' }" x-model="tanda" id="tandaType" name="tandaType" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Seleccione la tanda
                                        </option>
                                        <option value="Completa" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Completa
                                        </option>
                                        <option value="Matutina" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Matutina
                                        </option>
                                        <option value="Vespertina" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Vespertina
                                        </option>
                                        <option value="Especial" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Especial
                                        </option>
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
                                    Días a la Semana
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select x-data="{ dayWeek: '<?php echo $inv['days_week']; ?>' }" x-model="dayWeek" id="dayWeek" name="dayWeek" required class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Seleccione los días a la semana
                                        </option>
                                        <option value="1" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            1
                                        </option>
                                        <option value="2" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            2
                                        </option>
                                        <option value="3" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            3
                                        </option>
                                        <option value="4" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            4
                                        </option>
                                        <option value="5" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            5
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
                    <div class="col-span-full">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                            <div>
                                <label for="startTime" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Hora de inicio</label>
                                <input x-data="{ startTime: '<?= date("h:i A", strtotime($inv['start_Time'])); ?>' }" x-model="startTime" type="text" name="startTime" id="startTime" class="timepicker dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Hora de inicio (desde)">
                            </div>
                            <div>
                                <label for="endTime" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Hora de finalización</label>
                                <input x-data="{ endTime: '<?= date("h:i A", strtotime($inv['end_time'])); ?>' }" x-model="endTime" type="text" name="endTime" id="endTime" value="<?= remove_junk($inv['end_time']); ?>" class="timepicker dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Hora final (hasta)">
                            </div>
                            <div>
                                <label for="totalHours" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Total de horas</label>
                                <input x-data="{ totalHours: '<?= remove_junk($inv['total_hours']); ?>' }" x-model="totalHours" type="text" name="totalHours" id="totalHours" readonly class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Información adicional
                        </label>
                        <textarea placeholder="Información del recibo (opcional)" type="text" id="observations" name="observations" rows="7" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full resize-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="border-b border-gray-200 p-4 sm:p-8 dark:border-gray-800">
                <?php /* Desativado por el momento tabla para ver mas de un producto via alpine.js
            <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-800">
                <div class="custom-scrollbar overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-700 dark:border-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr class="border-b border-gray-100 whitespace-nowrap dark:border-gray-800">
                                <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                    S. No.
                                </th>
                                <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                                    Descripción
                                </th>
                                <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                    Cantidad
                                </th>
                                <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                    Precio
                                </th>
                                <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                    Sub Total
                                </th>
                                <th class="relative px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white dark:divide-gray-800 dark:bg-white/[0.03]">
                            <template x-for="(product, index) in products" :key="index">
                                <tr>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400" x-text="index + 1"></td>
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-800 dark:text-white/90" x-text="'Pago de ' + product.description"></td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400" x-text="product.quantity"></td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400" x-text="'RD$ ' + format(product.price.toFixed(2))">></td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400" x-text="'RD$ ' + format(product.subtotal)"></td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center justify-center">
                                            <svg @click="removeProduct(index)" class="hover:fill-error-500 dark:hover:fill-error-500 cursor-pointer fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            Desativado por el momento tabla para ver mas de un producto via alpine.js */ ?>
                <!-- Add Form -->
                <div class="mt-5 rounded-xl border border-gray-100 bg-gray-50 p-4 sm:p-6 dark:border-gray-800 dark:bg-gray-900">
                    <div @submit.prevent="addProduct">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 lg:grid-cols-12">
                            <div class="w-full lg:col-span-3">
                                <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Concepto de pago</label>
                                <select x-model="paymentType" id="paymentType" name="paymentType" required x-ref="serviceSelect" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                    <option value="" disabled selected>Seleccione un servicio</option>
                                    <option value="Inscripcion">Pago de Inscripcion</option>
                                    <option value="Mensualidad">Pago de Mensualidad</option>
                                </select>
                            </div>
                            <div class="w-full lg:col-span-3">
                                <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Precio</label>
                                <input x-model="form.price" type="number" id="price" name="price" readonly placeholder="Enter product price" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" required>
                            </div>
                            <div class="w-full lg:col-span-2">
                                <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Cantidad</label>
                                <div class="flex h-11 divide-x divide-gray-300 overflow-hidden rounded-lg border border-gray-300 dark:divide-gray-800 dark:border-gray-700">
                                    <button type="button" @click="form.quantity = Math.max(1, form.quantity - 1)" class="inline-flex w-1/3 items-center justify-center bg-white text-gray-700 hover:bg-gray-100 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.66699 12H18.6677" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    <div class="w-1/3">
                                        <input x-model="form.quantity" name="quantity" id="quantity" type="number" min="1" class="h-full w-full border-0 bg-white text-center text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                                    </div>
                                    <button type="button" @click="form.quantity++" class="inline-flex w-1/3 items-center justify-center bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.66699 12.0002H18.6677M12.6672 6V18.0007" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-full lg:col-span-2">
                                <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Descuento</label>
                                <select x-model="discount" id="discount" name="discount" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                    <option value="0">0%</option>
                                    <option value="1">1%</option>
                                    <option value="2">2%</option>
                                    <option value="3">3%</option>
                                    <option value="4">4%</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="20">20%</option>
                                    <option value="25">25%</option>
                                    <option value="30">30%</option>
                                    <option value="35">35%</option>
                                    <option value="40">40%</option>
                                    <option value="45">45%</option>
                                    <option value="50">50%</option>
                                </select>
                            </div>
                            <!-- Desativado por el momento boton para agregar mas de un producto via alpine.js
                        <div class="flex w-full items-end lg:col-span-2">
                            <button type="submit" class="hover:bg-brand-600 bg-brand-500 h-11 w-full rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                Guardar Producto
                            </button>
                        </div>
                        Desativado por el momento boton para agregar mas de un producto via alpine.js -->
                        </div>
                    </div>
                    <div class="mt-5 flex max-w-2xl items-center gap-2">
                        <svg class="text-gray-500 dark:text-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 7.22485H10.0007" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.0004 9.34575V12.8661M17.7087 10.0001C17.7087 14.2573 14.2575 17.7084 10.0003 17.7084C5.74313 17.7084 2.29199 14.2573 2.29199 10.0001C2.29199 5.74289 5.74313 2.29175 10.0003 2.29175C14.2575 2.29175 17.7087 5.74289 17.7087 10.0001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Después de ingresar los detalles del servicio, haz clic en “Guardar Servicio” para añadirlo a la factura.
                        </p>
                    </div>
                </div>

                <!-- Total Summary -->
                <div class="flex flex-wrap justify-between sm:justify-end">
                    <div class="mt-6 w-full space-y-1 text-right sm:w-[220px]">
                        <p class="mb-4 text-left text-sm font-medium text-gray-800 dark:text-white/90">
                            Resumen del pedido
                        </p>
                        <ul class="space-y-2">
                            <li class="flex justify-between gap-5">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Sub Total</span>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-400" x-text="'RD$ ' + format(subtotal)"></span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Descuento (%):</span>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-400" x-text="discountLabel"></span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="font-medium text-gray-700 dark:text-gray-400">Total</span>
                                <span class="text-lg font-semibold text-gray-800 dark:text-white/90" x-text="'RD$ ' + format(total)"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                    <button type="button" @click="viewPDF()" class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M2.46585 10.7925C2.23404 10.2899 2.23404 9.71023 2.46585 9.20764C3.78181 6.35442 6.66064 4.375 10.0003 4.375C13.3399 4.375 16.2187 6.35442 17.5347 9.20765C17.7665 9.71024 17.7665 10.2899 17.5347 10.7925C16.2187 13.6458 13.3399 15.6252 10.0003 15.6252C6.66064 15.6252 3.78181 13.6458 2.46585 10.7925Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.0212 10C13.0212 11.6684 11.6687 13.0208 10.0003 13.0208C8.33196 13.0208 6.97949 11.6684 6.97949 10C6.97949 8.33164 8.33196 6.97917 10.0003 6.97917C11.6687 6.97917 13.0212 8.33164 13.0212 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Previsualizar Factura
                    </button>
                    <button @click="savePDF($event)" id="saveInvoice" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M13.333 16.6666V12.9166C13.333 12.2262 12.7734 11.6666 12.083 11.6666L7.91634 11.6666C7.22599 11.6666 6.66634 12.2262 6.66634 12.9166L6.66635 16.6666M9.99967 5.83325H6.66634M15.4163 16.6666H4.58301C3.89265 16.6666 3.33301 16.1069 3.33301 15.4166V4.58325C3.33301 3.8929 3.89265 3.33325 4.58301 3.33325H12.8171C13.1483 3.33325 13.4659 3.46468 13.7003 3.69869L16.2995 6.29384C16.5343 6.52832 16.6662 6.84655 16.6662 7.17841L16.6663 15.4166C16.6663 16.1069 16.1066 16.6666 15.4163 16.6666Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Guardar factura
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="/src/includes/invoice/pricing-calculator.js"></script>