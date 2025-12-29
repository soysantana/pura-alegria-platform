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
                                Factura
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Fecha
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Servicio
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Tanda
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Accion
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <?php
            $user_id    = $_SESSION['user_id'];
            $user_level = remove_junk($user['user_level']);

            if ($user_level == 1) {
                $sql = "SELECT id, receipt_no, invoice_date, service_type, tanda_type, invoice_pdf FROM invoices;";
            } else {
                $sql = "SELECT id, receipt_no, invoice_date, service_type, tanda_type, invoice_pdf FROM invoices WHERE tutor_id = '{$user_id}'";
            }
            $invoices = find_by_sql($sql);
            ?>
            <!-- table body start -->
            <tbody class="py-3 divide-y divide-gray-100 dark:divide-gray-800">
                <?php foreach ($invoices as $inv): ?>
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex gap-3 pl-2">
                                <svg class="h-8 w-7" xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none">
                                    <path d="M4.8125 0.625C4.03047 0.625 3.39062 1.26484 3.39062 2.04688V21.9531C3.39062 22.7352 4.03047 23.375 4.8125 23.375H19.0312C19.8133 23.375 20.4531 22.7352 20.4531 21.9531V6.3125L14.7656 0.625H4.8125Z" fill="#E2E5E7"></path>
                                    <path d="M16.1875 6.3125H20.4531L14.7656 0.625V4.89062C14.7656 5.67266 15.4055 6.3125 16.1875 6.3125Z" fill="#B0B7BD"></path>
                                    <path d="M20.4531 10.5781L16.1875 6.3125H20.4531V10.5781Z" fill="#CAD1D8"></path>
                                    <path d="M17.6094 19.1094C17.6094 19.5004 17.2895 19.8203 16.8984 19.8203H1.25781C0.866797 19.8203 0.546875 19.5004 0.546875 19.1094V12C0.546875 11.609 0.866797 11.2891 1.25781 11.2891H16.8984C17.2895 11.2891 17.6094 11.609 17.6094 12V19.1094Z" fill="#F15642"></path>
                                    <path d="M3.64648 14.0956C3.64648 13.9079 3.79436 13.7031 4.03252 13.7031H5.34562C6.085 13.7031 6.75044 14.1979 6.75044 15.1463C6.75044 16.045 6.085 16.5455 5.34562 16.5455H4.39652V17.2962C4.39652 17.5465 4.23727 17.6879 4.03252 17.6879C3.84484 17.6879 3.64648 17.5465 3.64648 17.2962V14.0956ZM4.39652 14.419V15.8352H5.34562C5.72669 15.8352 6.02812 15.499 6.02812 15.1463C6.02812 14.7489 5.72669 14.419 5.34562 14.419H4.39652Z" fill="white"></path>
                                    <path d="M7.86314 17.6875C7.67545 17.6875 7.4707 17.5851 7.4707 17.3356V14.1065C7.4707 13.9025 7.67545 13.7539 7.86314 13.7539H9.16487C11.7626 13.7539 11.7058 17.6875 9.21605 17.6875H7.86314ZM8.22145 14.4478V16.9944H9.16487C10.6998 16.9944 10.768 14.4478 9.16487 14.4478H8.22145Z" fill="white"></path>
                                    <path d="M12.6284 14.494V15.3976H14.078C14.2828 15.3976 14.4875 15.6023 14.4875 15.8007C14.4875 15.9884 14.2828 16.1419 14.078 16.1419H12.6284V17.3356C12.6284 17.5347 12.4869 17.6875 12.2879 17.6875C12.0376 17.6875 11.8848 17.5347 11.8848 17.3356V14.1065C11.8848 13.9025 12.0383 13.7539 12.2879 13.7539H14.2835C14.5337 13.7539 14.6816 13.9025 14.6816 14.1065C14.6816 14.2885 14.5337 14.4933 14.2835 14.4933H12.6284V14.494Z" fill="white"></path>
                                    <path d="M16.8984 19.8203H3.39062V20.5312H16.8984C17.2895 20.5312 17.6094 20.2113 17.6094 19.8203V19.1094C17.6094 19.5004 17.2895 19.8203 16.8984 19.8203Z" fill="#CAD1D8"></path>
                                </svg>
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400"><?php echo remove_junk($inv['receipt_no']); ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    <?php echo remove_junk(date('d/m/Y', strtotime($inv['invoice_date']))); ?>
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    <?php echo remove_junk(ucfirst($inv['service_type'])); ?>
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    <?php echo remove_junk(ucfirst($inv['tanda_type'])); ?>
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center space-x-2">
                                <?php $deleteActionUrl = '/src/db/product/delete-product.php'; ?>
                                <svg
                                    @click="isDeleteModal = true;
                                    deleteId = '<?php echo (int)$inv['id']; ?>';"
                                    class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z"
                                        fill="">
                                    </path>
                                </svg>

                                <?php /* Boton de editar - deshabilitado por ahora
                                <svg
                                    @click="window.location.href = 'invoice-edit?id=<?php echo base64_encode((int)$inv['id']); ?>'"
                                    class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 18 18"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                                        fill="" />
                                </svg>
                                */ ?>

                                <svg
                                    @click="window.open('/src/uploads/<?php echo remove_junk($inv['invoice_pdf']); ?>', '_blank')"
                                    class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 dark:fill-gray-400"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <!-- table body end -->
        </table>
    </div>

    <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
        <div class="flex items-center justify-between" id="pagination-container"></div>
    </div>

</div>