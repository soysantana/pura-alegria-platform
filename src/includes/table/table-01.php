<div
  class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
  <div
    class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
        Recent Orders
      </h3>
    </div>

    <div class="flex items-center gap-3">
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
        Agregar
      </button>

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
                Products
              </p>
            </div>
          </th>
          <th class="py-3">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Category
              </p>
            </div>
          </th class="py-3">
          <th class="py-3">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Price
              </p>
            </div>
          </th>
          <th class="py-3">
            <div class="flex items-center col-span-2">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Status
              </p>
            </div>
          </th>
        </tr>
      </thead>
      <!-- table header end -->

      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
        <tr>
          <td class="py-3">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                  <img src="../images/product/product-01.jpg" alt="Product" />
                </div>
                <div>
                  <p
                    class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                    Macbook pro 13”
                  </p>
                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    2 Variants
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                Laptop
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                $2399.00
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p
                class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                Delivered
              </p>
            </div>
          </td>
        </tr>
        <!-- table item -->
        <tr>
          <td class="py-3">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                  <img src="../images/product/product-02.jpg" alt="Product" />
                </div>
                <div>
                  <p
                    class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                    Apple Watch Ultra
                  </p>
                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    1 Variants
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                Watch
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                $879.00
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p
                class="rounded-full bg-warning-50 px-2 py-0.5 text-theme-xs font-medium text-warning-600 dark:bg-warning-500/15 dark:text-orange-400">
                Pending
              </p>
            </div>
          </td>
        </tr>

        <!-- table item -->
        <tr>
          <td class="py-3">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                  <img src="../images/product/product-03.jpg" alt="Product" />
                </div>
                <div>
                  <p
                    class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                    iPhone 15 Pro Max
                  </p>
                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    2 Variants
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                SmartPhone
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                $1869.00
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p
                class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                Delivered
              </p>
            </div>
          </td>
        </tr>

        <!-- table item -->
        <tr>
          <td class="py-3">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                  <img src="../images/product/product-04.jpg" alt="Product" />
                </div>
                <div>
                  <p
                    class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                    iPad Pro 3rd Gen
                  </p>
                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    2 Variants
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                Electronics
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                $1699.00
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p
                class="rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                Canceled
              </p>
            </div>
          </td>
        </tr>

        <!-- table item -->
        <tr>
          <td class="py-3">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                  <img src="../images/product/product-05.jpg" alt="Product" />
                </div>
                <div>
                  <p
                    class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                    Airpods Pro 2nd Gen
                  </p>
                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    1 Variants
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                Accessories
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                $240.00
              </p>
            </div>
          </td>
          <td class="py-3">
            <div class="flex items-center">
              <p
                class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                Delivered
              </p>
            </div>
          </td>
        </tr>
        <!-- table body end -->
      </tbody>
    </table>
  </div>
</div>