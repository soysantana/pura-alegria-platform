<?php http_response_code(503); ?>

<?php
require_once(__DIR__ . '/../src/config/load.php');
?>

<!-- ===== Header Start ===== -->
<?php include_once __DIR__ . '/../src/components/header.php'; ?>
<!-- ===== Header End ===== -->

<!-- ===== Preloader Start ===== -->
<?php include_once __DIR__ . '/../src/includes/preloader.php'; ?>
<!-- ===== Preloader End ===== -->

<!-- ===== Page Wrapper Start ===== -->
<div
  class="relative z-1 flex min-h-screen flex-col items-center justify-center overflow-hidden p-6">
  <!-- ===== Common Grid Shape Start ===== -->
  <?php include_once __DIR__ . '/../src/includes/common-grid-shape.php'; ?>
  <!-- ===== Common Grid Shape End ===== -->

  <!-- Centered Content -->
  <div class="mx-auto w-full max-w-[242px] text-center sm:max-w-[472px]">
    <h1
      class="mb-8 text-title-md font-bold text-gray-800 dark:text-white/90 xl:text-title-2xl">
      ERROR
    </h1>

    <img src="/../src/images/error/503.svg" alt="503" class="dark:hidden" />
    <img
      src="/../src/images/error/503-dark.svg"
      alt="503"
      class="hidden dark:block" />

    <p
      class="mb-6 mt-10 text-base text-gray-700 dark:text-gray-400 sm:text-lg">
      Estamos realizando ajustes. Regresamos en breve.
    </p>

    <a
      href="/index.php"
      class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
      Volver a la página de inicio
    </a>
  </div>
  <!-- Footer -->
  <p
    class="absolute bottom-6 left-1/2 -translate-x-1/2 text-center text-sm text-gray-500 dark:text-gray-400">
    &copy; <span id="year"></span> - design by soysantana2
  </p>
</div>
<!-- ===== Page Wrapper End ===== -->

<script src="/build/bundle.js"></script>

</body>

</html>