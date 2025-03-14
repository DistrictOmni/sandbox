<!-- ANALYTICS (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'analyticsDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'analyticsDrawer') ? null : openDropdown"
>
  <!-- Trigger for Analytics Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Analytics Drawer"
  >
    <i class="fas fa-chart-bar text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Analytics</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'analyticsDrawer'"
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
    aria-label="Analytics Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Analytics & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "ANALYTICS & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-chart-bar text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Analytics
          </h2>
        </div>

        <!-- Example: Quick Links or Search for analytics items -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <!-- Subsection: Favorites / Bookmarks, or frequent tasks for analytics -->
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Analytics Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Daily KPI Dashboard</li>
              <li class="cursor-pointer hover:underline">Admissions Funnel</li>
            </ul>
          </div>

          <!-- Additional left-column sections as needed... -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (grid of analytics categories) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Dashboards & Real-Time Views -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-tachometer-alt text-blue-500"></i>
            <span>Dashboards</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-chart-line w-5 text-gray-500"></i>
              <span>Enrollment KPIs</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-user-graduate w-5 text-gray-500"></i>
              <span>Student Success Dashboard</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-building w-5 text-gray-500"></i>
              <span>Dept. &amp; Program Metrics</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #2: Reports & Data Exports -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-file-alt text-blue-500"></i>
            <span>Reports</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-table w-5 text-gray-500"></i>
              <span>Standard Reports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-database w-5 text-gray-500"></i>
              <span>Data Warehouse Exports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-chart-area w-5 text-gray-500"></i>
              <span>Trend Analysis</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #3: Advanced Analytics (Predictive, Data Science, etc.) -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-brain text-blue-500"></i>
            <span>Advanced Analytics</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-robot w-5 text-gray-500"></i>
              <span>Predictive Models</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-chart-pie w-5 text-gray-500"></i>
              <span>Machine Learning Insights</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-project-diagram w-5 text-gray-500"></i>
              <span>Network &amp; Cohort Analysis</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>
        <!-- Additional columns if needed... -->
      </div>
    </div>
  </div>
</li>
