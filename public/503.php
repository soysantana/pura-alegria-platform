<?php http_response_code(503); ?>

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

    <img src="/src/images/error/503.svg" alt="503" class="dark:hidden" />
    <img
      src="/src/images/error/503-dark.svg"
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
  <p class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
    &copy; <span id="year"></span> - design by soysantana2
    <a href="https://github.com/soysantana" target="_blank" class="hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 transition">
      <svg
        class="w-5 h-5"
        fill="currentColor"
        viewBox="0 0 24 24">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M12 .5C5.648.5.5 5.648.5 12c0 5.088 3.292 9.387 7.868 10.91.576.105.786-.25.786-.557 0-.274-.01-1-.016-1.963-3.2.695-3.876-1.543-3.876-1.543-.523-1.33-1.276-1.685-1.276-1.685-1.043-.713.078-.698.078-.698 1.152.082 1.758 1.184 1.758 1.184 1.025 1.755 2.69 1.248 3.344.954.104-.742.402-1.248.73-1.536-2.554-.29-5.236-1.277-5.236-5.68 0-1.255.447-2.28 1.18-3.082-.119-.29-.512-1.456.112-3.035 0 0 .963-.309 3.157 1.177a10.99 10.99 0 0 1 2.878-.387c.976.004 1.96.132 2.878.387 2.194-1.486 3.157-1.177 3.157-1.177.624 1.579.23 2.745.112 3.035.733.802 1.18 1.827 1.18 3.082 0 4.414-2.686 5.387-5.248 5.672.414.354.783 1.055.783 2.133 0 1.541-.015 2.783-.015 3.16 0 .309.21.666.792.553C20.71 21.382 24 17.084 24 12c0-6.352-5.148-11.5-12-11.5z" />
      </svg>
    </a>
    <a href="https://instagram.com/soysantana2" target="_blank" class="hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 transition">
      <svg
        class="w-5 h-5"
        fill="currentColor"
        viewBox="0 0 24 24">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 3.25a5.5 5.5 0 1 1 0 11 5.5 5.5 0 0 1 0-11zm0 1.5a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm5.25-.75a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0z" />
      </svg>
    </a>
  </p>
</div>
<!-- ===== Page Wrapper End ===== -->

<script src="/build/bundle.js"></script>

</body>

</html>