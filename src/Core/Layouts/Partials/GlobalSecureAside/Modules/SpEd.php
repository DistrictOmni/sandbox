<!-- SPED (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'spedDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'spedDrawer') ? null : openDropdown"
>
  <!-- Trigger for SpEd Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="SpEd Drawer"
  >
    <!-- Use an icon of your choice; here is an example: -->
    <i class="fas fa-wheelchair text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">SpEd</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'spedDrawer'"
    @click.away="openDropdown = null"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto"
    style="display: none;"
    role="menu" 
    aria-orientation="vertical" 
    aria-label="SpEd Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (SpEd & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "SPED & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-wheelchair text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            SpEd
          </h2>
        </div>

        <!-- Example: SpEd Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My SpEd Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Student Case Dashboard</li>
              <li class="cursor-pointer hover:underline">IEP Creation Wizard</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (SpEd management areas) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: IEP Management -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-file-signature text-blue-500"></i>
            <span>IEP Management</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-folder-plus w-5 text-gray-500"></i>
              <span>Create / Edit IEPs</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-calendar-check w-5 text-gray-500"></i>
              <span>IEP Meeting Scheduler</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-file-medical-alt w-5 text-gray-500"></i>
              <span>Progress Reports</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #2: Accommodations & Services -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-hand-holding-heart text-blue-500"></i>
            <span>Accommodations</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-user-md w-5 text-gray-500"></i>
              <span>Specialized Services</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-glasses w-5 text-gray-500"></i>
              <span>Instructional Supports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-file-invoice w-5 text-gray-500"></i>
              <span>Accommodations Matrix</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #3: Compliance & Reporting -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-chart-bar text-blue-500"></i>
            <span>Compliance</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>State/Federal Reports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-check-circle w-5 text-gray-500"></i>
              <span>Due Process Tracking</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
              <span>Compliance Audits</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- Add more columns if needed for additional SpEd features -->
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
