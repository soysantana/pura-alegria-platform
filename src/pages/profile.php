<?php
$page_title = 'Perfil';
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
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: `Perfil`}">
          <?php include_once '../includes/breadcrumb.php'; ?>
        </div>
        <!-- Breadcrumb End -->
        <?php echo display_msg($msg); ?>
        <div
          class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
          <h3
            class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            Perfil
          </h3>

          <div
            class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
            <div
              class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
              <div
                class="flex flex-col items-center w-full gap-6 xl:flex-row">
                <div
                  class="w-20 h-20 overflow-hidden border border-gray-200 rounded-full dark:border-gray-800">
                  <img src="/src/uploads/<?php echo remove_junk($user['picture']); ?>" alt="user" />
                </div>
                <div class="order-3 xl:order-2">
                  <h4
                    class="mb-2 text-lg font-semibold text-center text-gray-800 dark:text-white/90 xl:text-left">
                    <?php echo remove_junk($user['first_name']); ?>
                  </h4>
                  <div
                    class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      <?php echo remove_junk($user['group_name']); ?>
                    </p>
                    <div
                      class="hidden h-3.5 w-px bg-gray-300 dark:bg-gray-700 xl:block"></div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      <?php echo remove_junk($user['country']); ?>
                    </p>
                  </div>
                </div>
              </div>

              <button
                @click="isProfileInfoModal = true"
                class="flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto">
                <svg
                  class="fill-current"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                    fill="" />
                </svg>
                Editar
              </button>
            </div>
          </div>

          <div
            class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
            <div
              class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
              <div>
                <h4
                  class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                  Información Personal
                </h4>

                <div
                  class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Nombre
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['first_name']); ?>
                    </p>
                  </div>

                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Apellido
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['last_name']); ?>
                    </p>
                  </div>

                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Dirección de correo electrónico
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['email']); ?>
                    </p>
                  </div>

                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Teléfono
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['phone']); ?>
                    </p>
                  </div>
                </div>
              </div>

              <button
                @click="isProfileInfoModal = true"
                class="flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto">
                <svg
                  class="fill-current"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                    fill="" />
                </svg>
                Editar
              </button>
            </div>
          </div>
          <div
            class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
            <div
              class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
              <div>
                <h4
                  class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                  Dirección
                </h4>

                <div
                  class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      País
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['country']); ?>
                    </p>
                  </div>

                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Ciudad/Estado
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['city']); ?>
                    </p>
                  </div>

                  <div>
                    <p
                      class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                      Dirección
                    </p>
                    <p
                      class="text-sm font-medium text-gray-800 dark:text-white/90">
                      <?php echo remove_junk($user['address']); ?>
                    </p>
                  </div>
                </div>
              </div>

              <button
                @click="isProfileAddressModal = true"
                class="flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto">
                <svg
                  class="fill-current"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                    fill="" />
                </svg>
                Editar
              </button>
            </div>
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
<?php include_once '../includes/profile/profile-info-modal.php'; ?>
<?php include_once '../includes/profile/profile-address-modal.php'; ?>
<!-- END MODAL -->

<?php include_once '../components/footer.php'; ?>