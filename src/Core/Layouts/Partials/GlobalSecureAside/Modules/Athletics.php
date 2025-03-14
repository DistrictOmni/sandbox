<!-- ATHLETICS (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'athleticsDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'athleticsDrawer') ? null : openDropdown"
>
  <!-- Trigger for Athletics Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Athletics Drawer"
  >
    <i class="fas fa-basketball-ball text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Athletics</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'athleticsDrawer'"
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
    aria-label="Athletics Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Athletics & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "ATHLETICS & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-basketball-ball text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Athletics
          </h2>
        </div>

        <!-- Example: Athletics Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Athletics Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Upcoming Games Dashboard</li>
              <li class="cursor-pointer hover:underline">Team Roster Setup</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Athletics management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Teams & Scheduling -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-users text-blue-500"></i>
            <span>Teams &amp; Scheduling</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-user-plus w-5 text-gray-500"></i>
              <span>Team Roster Management</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
              <span>Practice Schedules</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-volleyball-ball w-5 text-gray-500"></i>
              <span>Game Schedules</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Eligibility & Compliance -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-check-double text-blue-500"></i>
            <span>Eligibility &amp; Compliance</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-id-card w-5 text-gray-500"></i>
              <span>Student Eligibility Checks</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-file-medical-alt w-5 text-gray-500"></i>
              <span>Physicals &amp; Waivers</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-handshake w-5 text-gray-500"></i>
              <span>League Compliance</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Equipment & Budget -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-football-ball text-blue-500"></i>
            <span>Equipment &amp; Budget</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-warehouse w-5 text-gray-500"></i>
              <span>Equipment Inventory</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-hand-holding-usd w-5 text-gray-500"></i>
              <span>Budget Tracking</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-dollar-sign w-5 text-gray-500"></i>
              <span>Fees &amp; Fundraising</span>
            </li>
          </ul>
        </div>
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
