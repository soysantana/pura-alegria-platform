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
        <div x-data="{ pageName: `Actividades`}">
          <?php include_once '../includes/breadcrumb.php'; ?>
        </div>
        <!-- Breadcrumb End -->

        <div
          class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
          <div class="mx-auto w-full max-w-[630px] text-center">
            <h3
              class="mb-4 text-theme-xl font-semibold text-gray-800 dark:text-white/90 sm:text-2xl">
              Card Title Here
            </h3>

            <p
              class="text-sm text-gray-500 dark:text-gray-400 sm:text-base">
              Start putting content on grids or panels, you can also use
              different combinations of grids.Please check out the
              dashboard and other pages
            </p>
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