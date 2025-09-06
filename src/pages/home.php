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
        <div class="grid grid-cols-12 gap-4 md:gap-6">
          <div class="col-span-12 space-y-6 xl:col-span-7">
            <!-- Metric Group One -->
            <?php include_once '../includes/metric-group/metric-group-01.php'; ?>
            <!-- Metric Group One -->

            <!-- ====== Chart One Start -->
            <?php include_once '../includes/chart/chart-01.php'; ?>
            <!-- ====== Chart One End -->
          </div>
          <div class="col-span-12 xl:col-span-5">
            <!-- ====== Chart Two Start -->
            <?php include_once '../includes/chart/chart-02.php'; ?>
            <!-- ====== Chart Two End -->
          </div>

          <div class="col-span-12">
            <!-- ====== Chart Three Start -->
            <?php include_once '../includes/chart/chart-03.php'; ?>
            <!-- ====== Chart Three End -->
          </div>

          <div class="col-span-12 xl:col-span-5">
            <!-- ====== Map One Start -->
            <?php include_once '../includes/map-01.php'; ?>
            <!-- ====== Map One End -->
          </div>

          <div class="col-span-12 xl:col-span-7">
            <!-- ====== Table One Start -->
            <?php include_once '../includes/table/table-01.php'; ?>
            <!-- ====== Table One End -->
          </div>

        </div>
      </div>
    </main>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<script src="/build/bundle.js"></script>

</body>

</html>