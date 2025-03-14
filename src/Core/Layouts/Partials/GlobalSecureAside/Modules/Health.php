<!-- WELLNESS (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'wellnessDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'wellnessDrawer') ? null : openDropdown"
>
  <!-- Trigger for Wellness Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Wellness Drawer"
  >
    <i class="fas fa-heartbeat text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Wellness</span>
  </div>

  <!-- The Drawer Itself -->
  <div 
    x-show="openDropdown === 'wellnessDrawer'"
    @click.away="openDropdown = null"
    x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;"
            role="menu" 
    aria-orientation="vertical" 
    aria-label="Wellness Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">
      <!-- LEFT COLUMN (could be Quick Actions or similar) -->
      <div class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200 
                  bg-gradient-to-br from-white to-gray-50 p-4">
        
        <!-- Large Title: "WELLNESS & QUICK ACTIONS" (Example) -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-heartbeat text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Wellness
          </h2>
        </div>

        <!-- Example: Search or Quick Links -->
        <!-- This area can mirror your "People" left column approach if desired -->
        <!-- e.g., a small search, favorites, frequent tasks, advanced ops, etc. -->

        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <!-- Subsection: Favorites / Bookmarks, etc. -->
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Wellness Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Counseling Center</li>
              <li class="cursor-pointer hover:underline">EAP Portal</li>
            </ul>
          </div>

          <!-- Additional sections as needed... -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS for your Wellness modules (similar to 2 or 3 columns) -->
      <div class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">

        <!-- COLUMN #1: Student Health Services -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-user-md text-blue-500"></i>
            <span>Student Health</span>
          </h2>
          <ul class="space-y-1">
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-stethoscope w-5 text-gray-500"></i>
              <span>Clinic Appointments</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-comment-medical w-5 text-gray-500"></i>
              <span>Mental Health &amp; Counseling</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- COLUMN #2: Staff / EAP -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-user-tie text-blue-500"></i>
            <span>Staff Wellness</span>
          </h2>
          <ul class="space-y-1">
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-heart w-5 text-gray-500"></i>
              <span>Employee Assistance Program (EAP)</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Wellness &amp; Benefits</span>
            </li>
            <!-- More items... -->
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Wellness Setup</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Certificate Types</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Health Code Sets</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Health Plan Templates</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Health Setup</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Immunization Exemption Types</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Screening Setup</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-hand-holding-heart w-5 text-gray-500"></i>
              <span>Vaccines</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Additional Services (Immunizations, etc.) -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-syringe text-blue-500"></i>
            <span>Health Services</span>
          </h2>
          <ul class="space-y-1">
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>Immunizations &amp; Records</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>Immunization Compliance</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>All Screenings</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-head-side-mask w-5 text-gray-500"></i>
              <span>COVID-19 Tracking</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
              <i class="fas fa-wheelchair w-5 text-gray-500"></i>
              <span>Disability Accommodations</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>Daily Health To-Do List</span>
            </li>
            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
              <i class="fas fa-file-medical w-5 text-gray-500"></i>
              <span>Health Screening and Physical Results</span>
            </li>
            <!-- More items... -->
          </ul>
        </div>

        <!-- Add more columns if you have further categories... -->

      </div>
    </div>
  </div>
</li>
