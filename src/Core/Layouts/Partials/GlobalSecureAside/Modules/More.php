  <!-- More (HOVER sub-drawer) -->
  <li class="relative w-full" @mouseenter="openDropdown = 'moreDrawer'"
        @mouseleave="openDropdown = (openDropdown === 'moreDrawer') ? null : openDropdown">
        <div class="flex flex-col items-center justify-center w-full h-20 
                 p-3 border-l-4 border-transparent cursor-pointer
                 text-gray-300 hover:bg-gray-700 hover:text-white 
                 hover:border-blue-400 transition-colors" aria-label="More Drawer">
            <i class="fas fa-ellipsis-h text-2xl" aria-hidden="true"></i>
            <span class="text-sm mt-1">More</span>
        </div>

        <!-- More sub-drawer (fade in/out) -->
        <div x-show="openDropdown === 'moreDrawer'" @click.away="openDropdown = null"
            class="fixed top-12 bottom-0 left-20 w-64 bg-white shadow-xl z-50 overflow-y-auto" style="display: none;"
            role="menu" aria-orientation="vertical" aria-label="More Drawer">
            <ul class="p-4 text-gray-800">
                <li class="p-2 border-b hover:bg-gray-100 cursor-pointer">Reports</li>
                <li class="p-2 border-b hover:bg-gray-100 cursor-pointer">Settings</li>
            </ul>
        </div>
    </li>