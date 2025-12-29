<nav x-data="{selected: $persist('Dashboard')}">
    <!-- Menu Group -->
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            <span
                class="menu-group-title"
                :class="sidebarToggle ? 'lg:hidden' : ''">
                MENU
            </span>

            <svg
                :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                class="mx-auto fill-current menu-group-icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                    fill="" />
            </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Dashboard -->
            <!-- Menu Item Dashboard -->

            <!-- Menu Item Profile -->
            <li>
                <a
                    href="/profile"
                    @click="selected = (selected === 'Profile' ? '':'Profile')"
                    class="menu-item group"
                    :class=" (selected === 'Profile' ||page === 'Profile') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Profile' || page === 'Profile') ?  'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Perfil del usuario
                    </span>
                </a>
            </li>
            <!-- Menu Item Profile -->

            <!-- Menu Item Management User -->
            <!-- Menu Item Management User -->

            <!-- Menu Item Activities -->
            <!-- Menu Item Activities -->

            <!-- Menu Report Infante -->
            <li>
                <a
                    href="/infant-report"
                    @click="selected = (selected === 'Infant' ? '':'Infant')"
                    class="menu-item group"
                    :class=" (selected === 'Infant' ||page === 'Infant') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Infant' || page === 'Infant') ?  'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Reporte Infante
                    </span>
                </a>
            </li>
            <!-- Menu Report Infante -->
        </ul>
    </div>

    <!-- Others Group -->
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            <span
                class="menu-group-title"
                :class="sidebarToggle ? 'lg:hidden' : ''">
                OTROS
            </span>

            <svg
                :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                class="mx-auto fill-current menu-group-icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                    fill="" />
            </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Inventory -->
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Inventory' ? '':'Inventory')"
                    class="menu-item group"
                    :class="(selected === 'Inventory') || (page === 'ProductsList' || page === 'Category' || page === 'ItemInfant') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Inventory') || (page === 'ProductsList' || page === 'Category' || page === 'ItemInfant') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M21 16V8a1 1 0 0 0-.553-.894l-8-4a1 1 0 0 0-.894 0l-8 4A1 1 0 0 0 3 8v8a1 1 0 0 0 .553.894l8 4a1 1 0 0 0 .894 0l8-4A1 1 0 0 0 21 16Zm-9-9.382L17.764 8 12 10.618 6.236 8 12 6.618ZM5 9.382l6 3v6.236l-6-3V9.382Zm8 9.236v-6.236l6-3v6.236l-6 3Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Inventario
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Inventory') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                            stroke=""
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>

                <!-- Dropdown Menu Start -->
                <div
                    class="overflow-hidden transform translate"
                    :class="(selected === 'Inventory') ? 'block' :'hidden'">
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        <li>
                            <a
                                href="/item-infant"
                                class="menu-dropdown-item group"
                                :class="page === 'ItemInfant' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Infante
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Inventory -->

            <!-- Menu Item Invoice -->
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Invoice' ? '':'Invoice')"
                    class="menu-item group"
                    :class="(selected === 'Invoice') || (page === 'CreateInvoice' || page === 'InvoiceHistory') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Invoice') || (page === 'CreateInvoice' || page === 'InvoiceHistory') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21 2H3v20l3-2 3 2 3-2 3 2 3-2 3 2V2Z"
                            stroke="currentColor"
                            stroke-width="2"
                            fill="none" />
                        <path
                            d="M8 8h8M8 12h8M8 16h8"
                            stroke="currentColor"
                            stroke-width="2" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Facturación
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Invoice') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                            stroke=""
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>

                <!-- Dropdown Menu Start -->
                <div
                    class="overflow-hidden transform translate"
                    :class="(selected === 'Invoice') ? 'block' :'hidden'">
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        <li>
                            <a
                                href="/invoices"
                                class="menu-dropdown-item group"
                                :class="page === 'InvoiceHistory' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Historial de facturas
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Invoice -->

            <!-- Menu Item Authentication -->
            <!-- Menu Item Authentication -->
        </ul>
    </div>
</nav>