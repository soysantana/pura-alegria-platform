<aside
    :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div
        :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="#">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="/src/images/logo/logo.svg" alt="Logo" />
                <img
                    class="hidden dark:block"
                    src="/src/images/logo/logo-dark.svg"
                    alt="Logo" />
            </span>

            <img
                class="logo-icon"
                :class="sidebarToggle ? 'lg:block' : 'hidden'"
                src="../images/logo/logo-icon.svg"
                alt="Logo" />
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div
        class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <?php if ($user['user_level'] === '1'): ?>
            <?php include_once('../includes/menu/menu-admin.php'); ?>
        <?php elseif ($user['user_level'] === '2'): ?>
            <?php include_once('../includes/menu/menu-cuidadora.php'); ?>
        <?php elseif ($user['user_level'] === '3'): ?>
            <?php include_once('../includes/menu/menu-tutor.php'); ?>
        <?php endif; ?>
        <!-- Sidebar Menu -->

        <!-- Promo Box -->
        <!-- Promo Box -->
    </div>
</aside>