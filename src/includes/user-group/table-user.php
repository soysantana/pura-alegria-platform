<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pt-4 pb-3 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Listado de Usuarios
            </h3>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <!-- table header start -->
            <thead class="border-gray-100 border-y dark:border-gray-800">
                <tr>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Usuario
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Nivel de Usuario
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Estado
                            </p>
                        </div>
                    </th>
                    <th class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Acciones
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->
            <?php $users = find_all_user(); ?>
            <!-- table body start -->
            <tbody class="py-3 divide-y divide-gray-100 dark:divide-gray-800">
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                    <div class="h-[50px] w-[50px] overflow-hidden rounded-full">
                                        <img src="/src/uploads/<?php echo remove_junk($user['picture']); ?>" alt="Infant">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                            <?php echo remove_junk(ucfirst($user['username'])); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    <?php echo remove_junk($user['group_name']); ?>
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center">
                                <?php
                                $status = remove_junk($user['status']);

                                if ($status == '1') {
                                    // Activo
                                    echo '<p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">Activo</p>';
                                } elseif ($status == '0') {
                                    // Inactivo
                                    echo '<p class="bg-error-50 text-theme-xs text-error-600 dark:bg-error-500/15 dark:text-error-500 rounded-full px-2 py-0.5 font-medium">Inactivo</p>';
                                }
                                ?>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap first:pl-0">
                            <div class="flex items-center space-x-2">
                                <?php $deleteActionUrl = '/src/db/user-group/delete-user.php'; ?>
                                <svg
                                    @click="isDeleteModal = true;
                                    deleteId = '<?php echo (int)$user['id']; ?>';"
                                    class=" cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400"
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

                                <svg
                                    @click="isEditUserModal = true;
                                    editUserId = '<?php echo (int)$user['id']; ?>';
                                    editUserStatus = '<?php echo (int)$user['status']; ?>';
                                    editUserLevel = '<?php echo remove_junk($user['user_level']); ?>';
                                    "
                                    class=" cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400"
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

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- table body end -->
        </table>
    </div>
</div>