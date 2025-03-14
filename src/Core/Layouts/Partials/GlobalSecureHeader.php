<div class="relative w-full h-full">
            <!-- LEFT SECTION -->
            <div class="absolute left-0 top-0 h-full flex items-center space-x-2 pl-2 pr-2 bg-gray-800">
                <!-- App Launcher -->
                <div class="relative inline-block">
                    <button aria-label="Open Applications Menu" class="p-2 hover:text-gray-200 focus:outline-none"
                        :aria-expanded="openDropdown === 'appsLauncher' ? 'true' : 'false'" aria-haspopup="true"
                        @click.stop="
              openDropdown = (openDropdown === 'appsLauncher') ? null : 'appsLauncher'
            ">
                        <!-- 3x3 Dot Grid -->
                        <div class="w-6 h-6 grid grid-cols-3 grid-rows-3 gap-1 text-white">
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                            <span class="block w-full h-full rounded-full bg-current"></span>
                        </div>
                    </button>

                    <!-- Apps Dropdown -->
                    <div x-show="openDropdown === 'appsLauncher'" @click.away="openDropdown = null"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 mt-2 max-h-96 w-96 bg-white text-black rounded-lg shadow-lg z-50 
                   origin-top-left p-2" style="display: none;" role="menu" aria-orientation="vertical"
                        aria-label="Applications Menu">
                        <!-- Arrow pointer -->
                        <div class="absolute -top-2 left-4 w-4 h-4 bg-white transform rotate-45"></div>
                        <!-- Search bar inside dropdown -->
                        <div class="border-b p-3">
                            <input aria-label="Search apps" type="text" placeholder="Search apps..."
                                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-400" />
                        </div>
                        <!-- Grid of Apps -->
                        <div class="overflow-auto" style="max-height: calc(24rem - 4.5rem);">
                            <div class="grid grid-cols-4 gap-4 p-4">
                                <!-- Example tile -->
                                <div class="text-center border p-2 rounded hover:bg-gray-100 cursor-pointer">
                                    <i class="fas fa-cog"></i>
                                    <p class="text-sm mt-1">Settings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DEV Env Indicator -->
                <div class="relative inline-block">
                    <button aria-label="Development Environment Info"
                        class="flex items-center text-xs font-semibold bg-red-600 hover:bg-red-700 px-2 py-1 rounded focus:outline-none"
                        :aria-expanded="openDropdown === 'devEnv' ? 'true' : 'false'" aria-haspopup="true" @click.stop="
              openDropdown = (openDropdown === 'devEnv') ? null : 'devEnv'
            ">
                        <i class="fas fa-exclamation-triangle mr-1" aria-hidden="true"></i>
                        <span>DEV</span>
                    </button>
                    <!-- DEV Dropdown -->
                    <div x-show="openDropdown === 'devEnv'" @click.away="openDropdown = null"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute top-full left-0 mt-2 w-96 bg-white border border-gray-200 shadow-lg p-4 text-sm text-black z-50"
                        style="display: none;" role="menu" aria-orientation="vertical"
                        aria-label="Development Environment Details">
                        <p class="mb-2 font-semibold text-gray-600">Development Environment</p>
                        <p class="text-gray-700">
                            This is the DEV environment. Use caution when testing new features.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END LEFT SECTION -->

            <!-- RIGHT SECTION -->
            <div class="absolute right-0 top-0 h-full flex items-center space-x-4 pr-4 bg-gray-800">
                <!-- NOTIFICATIONS -->
                <div class="relative inline-block">
                    <!-- MOBILE LINK -->
                    <a href="/notifications" class="block sm:hidden relative hover:text-gray-200 focus:outline-none"
                        aria-label="Notifications (Mobile)">
                        <i class="fas fa-bell" aria-hidden="true"></i>
                        <!-- Badge -->
                        <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full
                     text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                            3
                        </span>
                    </a>

                    <!-- DESKTOP DROPDOWN -->
                    <div class="hidden sm:block">
                        <button aria-label="Notifications (Desktop)"
                            class="hover:text-gray-200 focus:outline-none relative"
                            :aria-expanded="openDropdown === 'notifications' ? 'true' : 'false'" aria-haspopup="true"
                            @click.stop="
                openDropdown = (openDropdown === 'notifications') 
                  ? null 
                  : 'notifications'
              ">
                            <i class="fas fa-bell" aria-hidden="true"></i>
                            <!-- Badge -->
                            <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full
                       text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                                3
                            </span>
                        </button>

                        <!-- Notifications Dropdown -->
                        <div x-show="openDropdown === 'notifications'" @click.away="openDropdown = null"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200
                     shadow-md p-2 text-sm text-gray-700 z-50" style="display: none;" role="menu"
                            aria-orientation="vertical" aria-label="Notifications">
                            <p class="font-semibold text-gray-600 mb-2">Notifications</p>
                            <ul class="space-y-2">
                                <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                                    You have 2 new messages
                                </li>
                                <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                                    Upcoming staff meeting at 3pm
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MESSAGES -->
                <div class="relative inline-block">
                    <!-- MOBILE LINK -->
                    <a href="/messages" class="block sm:hidden relative hover:text-gray-200 focus:outline-none"
                        aria-label="Messages (Mobile)">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <!-- Badge -->
                        <span class="absolute top-0 right-0 bg-green-500 text-white rounded-full
                     text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                            5
                        </span>
                    </a>

                    <!-- DESKTOP DROPDOWN -->
                    <div class="hidden sm:block">
                        <button aria-label="Messages (Desktop)" class="hover:text-gray-200 focus:outline-none relative"
                            :aria-expanded="openDropdown === 'messages' ? 'true' : 'false'" aria-haspopup="true"
                            @click.stop="
                openDropdown = (openDropdown === 'messages') 
                  ? null 
                  : 'messages'
              ">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <!-- Badge -->
                            <span class="absolute top-0 right-0 bg-green-500 text-white rounded-full
                       text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                                5
                            </span>
                        </button>

                        <!-- Messages Dropdown -->
                        <div x-show="openDropdown === 'messages'" @click.away="openDropdown = null"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200
                     shadow-md p-2 text-sm text-gray-700 z-50" style="display: none;" role="menu"
                            aria-orientation="vertical" aria-label="Messages">
                            <p class="font-semibold text-gray-600 mb-2">Inbox</p>
                            <ul class="space-y-2">
                                <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                                    Message from Principal
                                </li>
                                <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                                    Parent Inquiry
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>




                <!-- Profile/Avatar -->
                <div class="relative inline-block">
                    <button aria-label="User Profile Menu" class="relative w-10 h-10 rounded-full border-2 border-transparent
                   hover:border-blue-400 focus:border-blue-400 focus:outline-none
                   flex items-center justify-center bg-gray-200"
                        :aria-expanded="openDropdown === 'profileMenu' ? 'true' : 'false'" aria-haspopup="true"
                        @click.stop="
              openDropdown = (openDropdown === 'profileMenu') ? null : 'profileMenu'
            ">
                        <!-- Fallback initials -->
                        <span class="font-bold text-gray-700">AB</span>
                        <!-- Status dot -->
                        <span class="absolute top-0 right-0 
                     h-3 w-3 rounded-full bg-green-500
                     ring-2 ring-white"></span>
                    </button>
                    <!-- Profile Menu -->
                    <div x-show="openDropdown === 'profileMenu'" @click.away="openDropdown = null"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-96 bg-white border border-gray-200 rounded-lg
                   shadow-lg py-3 z-50" style="display: none;" role="menu" aria-orientation="vertical"
                        aria-label="Profile Menu">
                        <!-- Top bar with Company Name + Chevron + Sign Out -->
                        <div class="px-4 pb-2 flex items-center justify-between" x-data="{ openCompany: false }"
                            @keydown.escape="openCompany = false">
                            <!-- Company Name + Chevron (click to open dropdown) -->
                            <div class="relative">
                                <button @click="openCompany = !openCompany" class="flex items-center space-x-1 font-semibold text-gray-800
             hover:text-blue-600 focus:outline-none" aria-haspopup="true" :aria-expanded="openCompany">
                                    <span>StarTek, Inc.</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>

                                <!-- Company Switcher Dropdown -->
                                <div x-show="openCompany" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1" @click.away="openCompany = false"
                                    class="absolute mt-2 w-60 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                    <!-- Header -->
                                    <div class="px-4 py-2 bg-gray-50 border-b border-gray-200">
                                        <p class="text-sm font-semibold text-gray-600">Switch Instance</p>
                                    </div>

                                    <!-- List of instances -->
                                    <ul class="py-1 text-sm text-gray-700">
                                        <!-- Example items; add or remove as needed -->
                                        <li>
                                            <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                                <!-- Optional icon -->
                                                <i class="fas fa-building text-gray-400 mr-2"></i>
                                                <!-- Instance label -->
                                                StarTek, Inc.
                                                <!-- Optional badge or checkmark for active instance
             <span class="ml-auto text-green-500">
               <i class="fas fa-check"></i>
             </span>
        -->
                                            </button>
                                        </li>
                                        <li>
                                            <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                                <i class="fas fa-industry text-gray-400 mr-2"></i>
                                                Acme Corp
                                            </button>
                                        </li>
                                        <li>
                                            <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                                <i class="fas fa-briefcase text-gray-400 mr-2"></i>
                                                Another Company
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <!-- Sign out button -->
                            <a href="/logout" class="text-sm text-red-600 border border-red-600 rounded-md px-2 py-1
           hover:bg-red-600 hover:text-white focus:outline-none">
                                Sign out
                            </a>
                        </div>

                        <!-- Horizontal divider -->
                        <hr class=" mb-3 border-gray-200">
                        <div class="px-4 pb-3 border-b border-gray-100">
                            <div class="flex items-center space-x-3">
                                <!-- Avatar with status dot -->
                                <div class="relative w-10 h-10 rounded-full bg-gray-300 flex-shrink-0">
                                    <span class="flex items-center justify-center h-full font-bold text-white">
                                        AH
                                    </span>
                                    <!-- Status dot in top-right -->
                                    <span class="absolute top-0 right-0 mt-0.5 mr-0.5
               h-3 w-3 rounded-full bg-green-500
               ring-2 ring-white"></span>
                                </div>

                                <!-- Text column (name, email, link, status) -->
                                <div class="leading-tight">
                                    <!-- Name -->
                                    <p class="font-semibold text-gray-700">
                                        Anthony Hudson
                                    </p>
                                    <!-- Email + “View account” -->
                                    <p class="text-sm text-gray-500">
                                        Anthony.Hudson@startek.com
                                        <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                            View account
                                            <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <ul class="mt-2">
                            <!-- STATUS DROPDOWN ITEM -->
                            <li x-data="{ open: false, selectedStatus: 'Available' }" class="relative">
                                <!-- Trigger row styled like your other menu items -->
                                <button @click="open = !open" type="button" class="flex items-center justify-between w-full px-4 py-2 
               hover:bg-gray-50 hover:text-blue-600
               text-gray-700 text-sm transition-colors">
                                    <!-- Left side: status icon + label -->
                                    <div class="flex items-center">
                                        <!-- Example: show the currently selected status icon -->
                                        <template x-if="selectedStatus === 'Available'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-green-500 text-white">
                                                <i class="fas fa-check text-xs"></i>
                                            </span>
                                        </template>
                                        <template x-if="selectedStatus === 'Busy'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white">
                                                <i class="fas fa-minus text-xs"></i>
                                            </span>
                                        </template>
                                        <template x-if="selectedStatus === 'Do not disturb'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white">
                                                <i class="fas fa-ban text-xs"></i>
                                            </span>
                                        </template>
                                        <template x-if="selectedStatus === 'Be right back'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white">
                                                <i class="fas fa-coffee text-xs"></i>
                                            </span>
                                        </template>
                                        <template x-if="selectedStatus === 'Appear away'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white">
                                                <i class="fas fa-clock text-xs"></i>
                                            </span>
                                        </template>
                                        <template x-if="selectedStatus === 'Appear offline'">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-gray-400 text-white">
                                                <i class="fas fa-times text-xs"></i>
                                            </span>
                                        </template>

                                        <!-- Status text -->
                                        <span class="ml-2" x-text="selectedStatus"></span>
                                    </div>

                                    <!-- Right side: down chevron -->
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200
               rounded-md shadow-lg py-1 z-50">
                                    <ul class="text-sm text-gray-700" role="menu" aria-orientation="vertical">
                                        <!-- Available -->
                                        <li>
                                            <button @click="selectedStatus = 'Available'; open = false"
                                                :class="selectedStatus === 'Available' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-green-500 text-white mr-2">
                                                    <i class="fas fa-check text-xs"></i>
                                                </span>
                                                Available
                                            </button>
                                        </li>
                                        <!-- Busy -->
                                        <li>
                                            <button @click="selectedStatus = 'Busy'; open = false"
                                                :class="selectedStatus === 'Busy' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white mr-2">
                                                    <i class="fas fa-minus text-xs"></i>
                                                </span>
                                                Busy
                                            </button>
                                        </li>
                                        <!-- Do not disturb -->
                                        <li>
                                            <button @click="selectedStatus = 'Do not disturb'; open = false"
                                                :class="selectedStatus === 'Do not disturb' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white mr-2">
                                                    <i class="fas fa-ban text-xs"></i>
                                                </span>
                                                Do not disturb
                                            </button>
                                        </li>
                                        <!-- Be right back -->
                                        <li>
                                            <button @click="selectedStatus = 'Be right back'; open = false"
                                                :class="selectedStatus === 'Be right back' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white mr-2">
                                                    <i class="fas fa-coffee text-xs"></i>
                                                </span>
                                                Be right back
                                            </button>
                                        </li>
                                        <!-- Appear away -->
                                        <li>
                                            <button @click="selectedStatus = 'Appear away'; open = false"
                                                :class="selectedStatus === 'Appear away' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white mr-2">
                                                    <i class="fas fa-clock text-xs"></i>
                                                </span>
                                                Appear away
                                            </button>
                                        </li>
                                        <!-- Appear offline -->
                                        <li>
                                            <button @click="selectedStatus = 'Appear offline'; open = false"
                                                :class="selectedStatus === 'Appear offline' ? 'bg-gray-100' : ''"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <span
                                                    class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-gray-400 text-white mr-2">
                                                    <i class="fas fa-times text-xs"></i>
                                                </span>
                                                Appear offline
                                            </button>
                                        </li>

                                        <!-- Divider -->
                                        <hr class="my-1 border-gray-200">

                                        <!-- Duration (sub-menu or next screen) -->
                                        <li>
                                            <button type="button"
                                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-gray-500 w-4 mr-2"></i>
                                                    Duration
                                                </div>
                                                <i class="fas fa-chevron-right text-gray-400"></i>
                                            </button>
                                        </li>

                                        <!-- Reset status -->
                                        <li>
                                            <button @click="selectedStatus = 'Available'; open = false"
                                                class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                                <i class="fas fa-undo text-gray-500 w-4 mr-2"></i>
                                                Reset status
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Another link, e.g. Account Settings -->
                            <li>
                                <a href="/account-settings" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-blue-600
               text-gray-700 text-sm transition-colors" role="menuitem">
                                    <i class="fas fa-cog w-4 mr-2"></i>
                                    Account Settings
                                </a>
                            </li>
                            <!-- Possibly more shortcuts... -->
                        </ul>


                        <!-- Optional advanced or grouped items -->
                        <div class="mt-2 border-t border-gray-100 pt-2">
                            <ul>
                                <li>
                                    <a href="/switch-workspace" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-blue-600
                 text-gray-700 text-sm transition-colors" role="menuitem">
                                        <i class="fas fa-exchange-alt w-4 mr-2"></i>
                                        Switch Workspace
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-50 hover:text-blue-600
                 text-gray-700 text-sm transition-colors" role="menuitem">
                                        <i class="fas fa-adjust w-4 mr-2"></i>
                                        Dark Mode
                                        <!-- Example toggle switch -->
                                        <span class="ml-auto relative">
                                            <span class="block w-8 h-4 bg-gray-300 rounded-full shadow-inner"></span>
                                            <span class="dot absolute left-0 top-0 w-4 h-4 bg-white rounded-full shadow
                         transform transition-transform"></span>
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- Bottom Section: Footer with Security Info -->
                        <div class="mt-2 border-t border-gray-100 pt-2 px-4">
                            <!-- Example environment/instance & version -->
                            <p class="text-xs text-gray-500">
                                Instance: <span class="font-semibold text-gray-600">Production</span><br>
                                Version: <span class="font-semibold text-gray-600">v2.3.1</span>
                            </p>
                            <!-- Example IP / location -->
                            <p class="mt-1 text-xs text-gray-500">
                                IP: <span class="font-semibold text-gray-600">192.168.0.12</span><br>
                                Location: <span class="font-semibold text-gray-600">Austin, TX</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END RIGHT SECTION -->

            <!-- ABSOLUTE CENTER: Search or Title -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="pointer-events-auto">
                    <!-- Desktop Search: sm+ -->
                    <input aria-label="Search"
                        class="hidden sm:block w-64 md:w-72 lg:w-80 xl:w-96 p-1 rounded text-gray-800" type="text"
                        placeholder="Search..." />
                    <!-- Mobile Title: < sm -->
                    <div class="sm:hidden">
                        <span class="text-white font-bold text-sm">My App Title</span>
                    </div>
                </div>
            </div>
            <!-- MOBILE-ONLY SEARCH DROPDOWN -->
    <div class="sm:hidden absolute top-12 left-0 right-0 bg-white p-3 shadow z-50"
        x-show="openDropdown === 'mobileSearch'" @click.away="openDropdown = null"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
        style="display: none;">
        <input aria-label="Mobile Search"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-400" type="text"
            placeholder="Search..." />
        <div class="mt-2 text-center text-gray-500">
            <p>Start typing to see suggestions or search helpful hints and tricks</p>
            <img src="some-placeholder.png" alt="search help" class="mx-auto mt-3 w-16 h-16 object-contain" />
        </div>
    </div>
        </div>