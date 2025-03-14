<!-- NUTRITION (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'nutritionDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'nutritionDrawer') ? null : openDropdown"
>
  <!-- Trigger for Nutrition Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Nutrition Drawer"
  >
    <i class="fas fa-utensils text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Nutrition</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'nutritionDrawer'"
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
    aria-label="Nutrition Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Nutrition & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "NUTRITION & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-utensils text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Nutrition
          </h2>
        </div>

        <!-- Example: Nutrition Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Nutrition Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Meal Program Dashboard</li>
              <li class="cursor-pointer hover:underline">Low Balance Alerts</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Nutrition management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Meal Programs -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-apple-alt text-blue-500"></i>
            <span>Meal Programs</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-seedling w-5 text-gray-500"></i>
              <span>Program Setup</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-calendar-day w-5 text-gray-500"></i>
              <span>Daily Menus</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-truck w-5 text-gray-500"></i>
              <span>Vendors &amp; Suppliers</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Student Data -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-users text-blue-500"></i>
            <span>Student Data</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
              <span>Cafeteria Rosters</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-percentage w-5 text-gray-500"></i>
              <span>Free/Reduced Lunch</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-wallet w-5 text-gray-500"></i>
              <span>Lunch Account Balances</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Reports & Compliance -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-file-invoice-dollar text-blue-500"></i>
            <span>Reports &amp; Compliance</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-chart-pie w-5 text-gray-500"></i>
              <span>Participation Reports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-check-circle w-5 text-gray-500"></i>
              <span>Nutrition Audits</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-balance-scale w-5 text-gray-500"></i>
              <span>State/Federal Compliance</span>
            </li>
          </ul>
        </div>

      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
