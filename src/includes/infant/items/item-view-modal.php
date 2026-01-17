 <?php
  require_once dirname(__DIR__, 3) . '/config/load.php';
  $id = 0;
  if (!empty($_POST['viewItemId'])) {
    $id = (int) base64_decode($_POST['viewItemId']);
  }
  $items = find_by_sql("SELECT * FROM item_infants WHERE infant_id = $id");
  ?>
 <div
   x-data="{ isViewItemModal: true }"
   x-show="isViewItemModal"
   class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
   <div
     class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
   <div
     @click.outside="isViewItemModal = false"
     class="no-scrollbar relative flex w-full max-w-[700px] flex-col overflow-y-auto rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-11">
     <!-- close btn -->
     <button
       @click="isViewItemModal = false"
       class="transition-color absolute right-5 top-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
       <svg
         class="fill-current"
         width="24"
         height="24"
         viewBox="0 0 24 24"
         fill="none"
         xmlns="http://www.w3.org/2000/svg">
         <path
           fill-rule="evenodd"
           clip-rule="evenodd"
           d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
           fill="" />
       </svg>
     </button>

     <div class="px-2 pr-14">
       <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
         Agregar actividad
       </h4>
       <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
         Registra una nueva tarea en tu lista de actividades.
       </p>
     </div>
     <form class="flex flex-col">
       <div class="px-2 overflow-y-auto custom-scrollbar">
         <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
           <div class="col-span-2">

             <table class="min-w-full text-left text-sm text-gray-700 dark:border-gray-800">
               <thead class="bg-gray-50 dark:bg-gray-900">
                 <tr class="border-b border-gray-100 whitespace-nowrap dark:border-gray-800">
                   <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                     S. No.
                   </th>
                   <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                     Articulo
                   </th>
                   <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                     Unidad de medida
                   </th>
                   <th class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                     Cantidad
                   </th>
                   <th class="relative px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-700 dark:text-gray-400">
                     <span class="sr-only">Actions</span>
                   </th>
                 </tr>
               </thead>
               <tbody class="divide-y divide-gray-100 bg-white dark:divide-gray-800 dark:bg-white/[0.03]">
                 <?php foreach ($items as $item): ?>
                   <tr>
                     <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400"><?= count_id(); ?></td>
                     <td class="px-5 py-4 text-sm font-medium whitespace-nowrap text-gray-800 dark:text-white/90">
                       <input disabled type="text" name="itemName[]" value="<?= remove_junk(ucfirst($item['name'])); ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                     </td>
                     <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                       <input disabled type="text" name="itemUnit[]" value="<?= remove_junk(ucfirst($item['unit_measurement'])); ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                     </td>
                     <td class="px-5 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                       <div class="w-1/3">
                         <input disabled type="number" name="itemQuantity[]" value="<?= $item['quantity']; ?>" class="h-full w-full border-0 bg-white text-sm text-gray-700 outline-none focus:ring-0 dark:bg-gray-900 dark:text-gray-400">
                       </div>
                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>

           </div>

         </div>
       </div>
       <div class="flex items-center gap-3 mt-6 lg:justify-end">
         <button
           @click="isViewItemModal = false"
           type="button"
           class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
           Cerrar
         </button>
       </div>
     </form>
   </div>
 </div>