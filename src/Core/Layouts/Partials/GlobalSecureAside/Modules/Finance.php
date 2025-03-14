<!-- FINANCE (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'financeDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'financeDrawer') ? null : openDropdown"
>
  <!-- Trigger for Finance Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Finance Drawer"
  >
    <i class="fas fa-coins text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Finance</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'financeDrawer'"
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
    aria-label="Finance Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Finance & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "FINANCE & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-coins text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Finance
          </h2>
        </div>

        <!-- Example: Finance Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Finance Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Expense Dashboard</li>
              <li class="cursor-pointer hover:underline">Budget Summary</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Finance management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Accounts & Budgets -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-piggy-bank text-blue-500"></i>
            <span>Accounts &amp; Budgets</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-file-invoice-dollar w-5 text-gray-500"></i>
              <span>Manage Accounts</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-chart-pie w-5 text-gray-500"></i>
              <span>Budget Allocations</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-user-edit w-5 text-gray-500"></i>
              <span>Approver Setup</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Purchasing & Payments -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-shopping-cart text-blue-500"></i>
            <span>Purchasing &amp; Payments</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-file-invoice w-5 text-gray-500"></i>
              <span>Purchase Orders</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-cash-register w-5 text-gray-500"></i>
              <span>Payment Processing</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clipboard-check w-5 text-gray-500"></i>
              <span>Invoice Approvals</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Reporting & Audits -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-file-alt text-blue-500"></i>
            <span>Reporting &amp; Audits</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-chart-bar w-5 text-gray-500"></i>
              <span>Finance Reports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-search-dollar w-5 text-gray-500"></i>
              <span>Internal Audits</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-shield-alt w-5 text-gray-500"></i>
              <span>Regulatory Compliance</span>
            </li>
          </ul>
        </div>
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
