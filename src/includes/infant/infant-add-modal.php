<div
  x-show="isAddInfantModal"
  class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
  <div
    class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
  <div
    @click.outside="isAddInfantModal = false"
    class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
    <!-- close btn -->
    <button
      @click="isAddInfantModal = false"
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
        Agregar nuevo infante
      </h4>
      <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
        Completa los datos para registrar un infante.
      </p>
    </div>
    <form
      class="flex flex-col"
      action="/src/db/infant/add-infant.php"
      method="POST"
      enctype="multipart/form-data">
      <div class="custom-scrollbar overflow-y-auto px-2">
        <div class="mt-2">
          <h5
            class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
            Información Personal
          </h5>

          <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Nombre
              </label>
              <input
                type="text"
                id="firstName"
                name="firstName"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Apellido
              </label>
              <input
                type="text"
                id="lastName"
                name="lastName"
                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Fecha de Nacimiento
              </label>
              <input
                type="date"
                id="birthDate"
                name="birthDate"
                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Genero
              </label>
              <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                <select
                  id="gender"
                  name="gender"
                  class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                  <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" disabled selected hidden>
                    Seleccione un genero
                  </option>
                  <option value="M" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Masculino
                  </option>
                  <option value="F" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Femenino
                  </option>
                </select>
                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                  <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </div>
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Tutor
              </label>
              <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                <?php $tutors = find_all_tutor(); ?>
                <select
                  id="infanteTutor"
                  name="infanteTutor"
                  class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                  <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" disabled selected hidden>
                    Seleccione un tutor
                  </option>
                  <?php foreach ($tutors as $tutor): ?>
                    <option value="<?php echo remove_junk($tutor['id']); ?>" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                      <?php echo remove_junk(ucfirst($tutor['first_name'])); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                  <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </div>
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label
                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Imagen
              </label>
              <input
                type="file"
                id="picture"
                name="picture"
                accept="image/*"
                class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400">
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end">
        <button
          @click="isAddInfantModal = false"
          type="button"
          class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
          Cerrar
        </button>
        <button
          type="submit"
          class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
          Guardar Cambios
        </button>
      </div>
    </form>
  </div>
</div>