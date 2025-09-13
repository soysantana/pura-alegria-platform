<?php
$page_title = 'Reporte Infante';
require_once('../config/load.php');
page_require_level(3);
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
                <div x-data="{ pageName: `Reporte Infante`}">
                    <?php include_once '../includes/breadcrumb.php'; ?>
                </div>
                <!-- Breadcrumb End -->

                <?php include_once '../includes/infant/card-infant.php'; ?>
                <?php include_once '../includes/infant/table-infant-report.php'; ?>

            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<?php include_once '../components/footer.php'; ?>