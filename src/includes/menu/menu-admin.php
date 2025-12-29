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
            <li>
                <a
                    href="/home"
                    @click="selected = (selected === 'Dashboard' ? '':'Dashboard')"
                    class="menu-item group"
                    :class=" (selected === 'Dashboard' || page === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Dashboard' || page === 'Dashboard') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Panel de control
                    </span>
                </a>
            </li>
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
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Management' ? '':'Management')"
                    class="menu-item group"
                    :class="(selected === 'Management') || (page === 'InfantManager' || page === 'UserManager' || page === 'GroupUser') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Management') || (page === 'InfantManager' || page === 'UserManager' || page === 'GroupUser') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z"
                            fill="">
                        </path>
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Gestión
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Management') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
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
                    :class="(selected === 'Management') ? 'block' :'hidden'">
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        <li>
                            <a
                                href="/infant"
                                class="menu-dropdown-item group"
                                :class="page === 'InfantManager' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Infantes
                            </a>
                        </li>
                        <li>
                            <a
                                href="/user"
                                class="menu-dropdown-item group"
                                :class="page === 'UserManager' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Usuarios
                            </a>
                        </li>
                        <li>
                            <a
                                href="/group-user"
                                class="menu-dropdown-item group"
                                :class="page === 'GroupUser' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Grupos
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Management User -->

            <!-- Menu Item Pages -->
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Pages' ? '':'Pages')"
                    class="menu-item group"
                    :class="(selected === 'Pages') || (page === 'Activities' || page === 'AddActivity') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Pages') || (page === 'Activities' || page === 'AddActivity') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Actividades
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Pages') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
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
                    :class="(selected === 'Pages') ? 'block' :'hidden'">
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        <li>
                            <a
                                href="/add-activity"
                                class="menu-dropdown-item group"
                                :class="page === 'AddActivity' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Agregar
                            </a>
                        </li>
                        <li>
                            <a
                                href="/activity"
                                class="menu-dropdown-item group"
                                :class="page === 'Activity' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Asignar a infante
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Pages -->

            <!-- Menu Item Infant -->
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
            <!-- Menu Item Infant -->
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
                                href="/products"
                                class="menu-dropdown-item group"
                                :class="page === 'ProductsList' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a
                                href="/products-category"
                                class="menu-dropdown-item group"
                                :class="page === 'Category' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Categoria
                            </a>
                        </li>
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
                                href="/invoice-add"
                                class="menu-dropdown-item group"
                                :class="page === 'CreateInvoice' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Crear factura
                            </a>
                        </li>
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
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Authentication' ? '':'Authentication')"
                    class="menu-item group"
                    :class="(selected === 'Authentication') || (page === 'basicChart' || page === 'advancedChart') ? 'menu-item-active' : 'menu-item-inactive'">
                    <svg
                        :class="(selected === 'Authentication') || (page === 'basicChart' || page === 'advancedChart') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M14 2.75C14 2.33579 14.3358 2 14.75 2C15.1642 2 15.5 2.33579 15.5 2.75V5.73291L17.75 5.73291H19C19.4142 5.73291 19.75 6.0687 19.75 6.48291C19.75 6.89712 19.4142 7.23291 19 7.23291H18.5L18.5 12.2329C18.5 15.5691 15.9866 18.3183 12.75 18.6901V21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25V18.6901C8.01342 18.3183 5.5 15.5691 5.5 12.2329L5.5 7.23291H5C4.58579 7.23291 4.25 6.89712 4.25 6.48291C4.25 6.0687 4.58579 5.73291 5 5.73291L6.25 5.73291L8.5 5.73291L8.5 2.75C8.5 2.33579 8.83579 2 9.25 2C9.66421 2 10 2.33579 10 2.75L10 5.73291L14 5.73291V2.75ZM7 7.23291L7 12.2329C7 14.9943 9.23858 17.2329 12 17.2329C14.7614 17.2329 17 14.9943 17 12.2329L17 7.23291L7 7.23291Z"
                            fill="" />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        Autenticación
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Authentication') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
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
                    :class="(selected === 'Authentication') ? 'block' :'hidden'">
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        <li>
                            <a
                                href="/signin"
                                class="menu-dropdown-item group"
                                :class="page === 'signin' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Iniciar Sesión
                            </a>
                        </li>
                        <li>
                            <a
                                href="/signup"
                                class="menu-dropdown-item group"
                                :class="page === 'signup' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                Registrarse
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Authentication -->
        </ul>
    </div>
</nav>