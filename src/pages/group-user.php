<?php
$page_title = 'Grupo de Usuarios';
require_once('../config/load.php');
page_require_level(1);
?>
<!-- ===== Header Start ===== -->
<?php include_once '../components/header.php'; ?>
<!-- ===== Header End ===== -->

<!-- ===== Preloader Start ===== -->
<?php include_once '../includes/preloader.php'; ?>
<!-- ===== Preloader End ===== -->

<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    <?php include_once '../components/sidebar.php'; ?>
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- Small Device Overlay Start -->
        <?php include_once '../includes/overlay.php'; ?>
        <!-- Small Device Overlay End -->

        <!-- ===== Navbar Start ===== -->
        <?php include_once '../components/navbar.php'; ?>
        <!-- ===== Navbar End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                <!-- Breadcrumb Start -->
                <div x-data="{ pageName: `Grupo de Usuarios` }">
                    <?php include_once '../includes/breadcrumb.php'; ?>
                </div>
                <!-- Breadcrumb End -->

                <?php echo display_msg($msg); ?>

                <?php include_once '../includes/user-group/table-group.php'; ?>

            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<!-- BEGIN MODAL -->
<?php include_once '../includes/user-group/group-add-modal.php'; ?>
<?php include_once '../includes/user-group/group-edit-modal.php'; ?>
<?php include_once '../includes/confirm-delete-modal.php'; ?>
<!-- END MODAL -->

<?php include_once '../components/footer.php'; ?>