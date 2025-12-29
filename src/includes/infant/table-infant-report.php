<div
  class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
  <div
    class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
        Registro de las actividades
      </h3>
    </div>
  </div>

  <div class="w-full overflow-x-auto">
    <table class="min-w-full">
      <!-- table header start -->
      <thead>
        <tr class="border-gray-100 border-y dark:border-gray-800">
          <th class="py-3">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Nombre de la cuidadora
              </p>
            </div>
          </th>
          <th class="py-3">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Actividad
              </p>
            </div>
          </th>
          <th class="py-3">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Fecha
              </p>
            </div>
          </th class="py-3">
        </tr>
      </thead>
      <!-- table header end -->
      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
        <?php if (!empty($logs)): ?>
          <?php foreach ($logs as $log): ?>
            <tr>
              <td class="py-3">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    <?php echo remove_junk(ucfirst($log['caregiver_name'])); ?>
                  </p>
                </div>
              </td>
              <td class="py-3">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    <?php echo remove_junk(ucfirst($log['activity_name'])); ?>
                  </p>
                </div>
              </td>
              <td class="py-3">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    <?php echo remove_junk(date('d/m/Y h:i A', strtotime($log['created_at']))); ?>
                  </p>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="py-4 text-center text-gray-400">
              No hay actividades registradas
            </td>
          </tr>
        <?php endif; ?>
        <!-- table item -->
        <!-- table body end -->
      </tbody>
    </table>
  </div>
</div>
<div class="mt-6"></div>