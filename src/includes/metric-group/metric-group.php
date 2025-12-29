<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
  <!-- Metric Item Start -->
  <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03]">
    <p class="text-theme-sm text-gray-500 dark:text-gray-400">
      Infantes Registrados
    </p>
    <?php $count = count_by_id('infants'); ?>
    <div class="mt-3 flex items-end justify-between">
      <div>
        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
          <?php echo remove_junk($count['total']); ?>
        </h4>
      </div>

      <div class="flex items-center gap-1">
        <button
          @click="isAddInfantModal = true"
          class="inline-flex items-center justify-center gap-1 rounded-full bg-brand-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-brand-500 dark:bg-brand-500/15 dark:text-brand-400">
          <svg
            class="fill-current"
            width="12"
            height="12"
            viewBox="0 0 12 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.25012 3C5.25012 2.58579 5.58591 2.25 6.00012 2.25C6.41433 2.25 6.75012 2.58579 6.75012 3V5.25012L9.00034 5.25012C9.41455 5.25012 9.75034 5.58591 9.75034 6.00012C9.75034 6.41433 9.41455 6.75012 9.00034 6.75012H6.75012V9.00034C6.75012 9.41455 6.41433 9.75034 6.00012 9.75034C5.58591 9.75034 5.25012 9.41455 5.25012 9.00034L5.25012 6.75012H3C2.58579 6.75012 2.25 6.41433 2.25 6.00012C2.25 5.58591 2.58579 5.25012 3 5.25012H5.25012V3Z"
              fill="">
            </path>
          </svg>
          Agregar Nuevo Infante
        </button>

      </div>
    </div>
  </div>
  <!-- Metric Item End -->
</div>