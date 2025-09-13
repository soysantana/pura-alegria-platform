<?php
$page_title = 'Inicio';
require_once('../config/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect("signin.php", false);
}
?>

<?php
$current_user = current_user();

if (isset($current_user['user_level']) && $current_user['user_level'] == 3) {
  header("Location: /src/pages/infant-report.php");
  exit();
}

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
    class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
    <!-- Small Device Overlay Start -->
    <?php include_once '../includes/overlay.php'; ?>
    <!-- Small Device Overlay End -->

    <!-- ===== Navbar Start ===== -->
    <?php include_once '../components/navbar.php'; ?>
    <!-- ===== Navbar End ===== -->

    <!-- ===== Main Content Start ===== -->
    <main>
      <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <?php echo display_msg($msg); ?>
        <div class="grid grid-cols-12 gap-4 md:gap-6">
          <div class="col-span-12 space-y-6 xl:col-span-8">
            <div class="col-span-12">
              <!-- Metric Group Two -->
              <?php include_once '../includes/metric-group/metric-group.php'; ?>
              <!-- Metric Group Two -->
            </div>
          </div>

          <div class="col-span-12">
            <?php include_once '../includes/caregiver/table.php'; ?>
          </div>

          <div class="col-span-12 xl:col-span-5">
          </div>

          <div class="col-span-12 xl:col-span-7">
          </div>

        </div>
      </div>
    </main>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<!-- BEGIN MODAL -->
<?php include_once '../includes/infant/infant-add-modal.php'; ?>
<?php include_once '../includes/caregiver/caregiver-assign-modal.php'; ?>
<?php include_once '../includes/confirm-delete-modal.php'; ?>
<!-- END MODAL -->

<?php include_once '../components/footer.php'; ?>