<!-- ADMIN (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'adminDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'adminDrawer') ? null : openDropdown"
>
  <!-- Trigger for Admin Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Admin Drawer"
  >
    <i class="fas fa-user-cog text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Admin</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'adminDrawer'"
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
    aria-label="Admin Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Admin & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "ADMIN & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-user-cog text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Admin
          </h2>
        </div>

        <!-- Example: Admin Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Admin Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">System Config Dashboard</li>
              <li class="cursor-pointer hover:underline">District Setup Wizard</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (grid for system/district/school management) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: System Setup -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-cogs text-blue-500"></i>
            <span>System Setup</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-tools w-5 text-gray-500"></i>
              <span>Global Configuration</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-user-shield w-5 text-gray-500"></i>
              <span>User Roles &amp; Permissions</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-database w-5 text-gray-500"></i>
              <span>Database Maintenance</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #2: District & School Setup -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-school text-blue-500"></i>
            <span>District &amp; Schools</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-map-marked-alt w-5 text-gray-500"></i>
              <span>Manage Districts</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-city w-5 text-gray-500"></i>
              <span>School Setup</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-route w-5 text-gray-500"></i>
              <span>Attendance Zones</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #3: Security & Audits -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-shield-alt text-blue-500"></i>
            <span>Security &amp; Audits</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-user-lock w-5 text-gray-500"></i>
              <span>Access Control</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-file-medical-alt w-5 text-gray-500"></i>
              <span>System Audit Logs</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-user-secret w-5 text-gray-500"></i>
              <span>Privacy &amp; Compliance</span>
            </li>
            <!-- Additional items... -->
          </ul>
        </div>
        
        <!-- Add more columns if needed (e.g. advanced config, enterprise integrations) -->
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
