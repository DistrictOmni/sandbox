<nav class="space-y-1 text-sm">

<?php require_once "AsideItems/StudentProfile.php"; ?>

<!-- Academic Records Menu -->
<li class="relative w-full"
    @mouseenter="openDropdown = 'academicRecordsMenu'"
    @mouseleave="openDropdown = (openDropdown === 'academicRecordsMenu') ? null : openDropdown"
    style="list-style-type: none;">
  <div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
    <i class="fas fa-book text-xl mr-3"></i>
    <span class="text-sm flex items-center">Academic Records</span>
    <i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
       :class="{'rotate-180': openDropdown === 'academicRecordsMenu'}"></i>
  </div>

  <!-- Academic Records Drawer -->
  <div x-show="openDropdown === 'academicRecordsMenu'"
       @click.away="openDropdown = null"
       x-transition:enter="transition ease-out duration-150"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in duration-100"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
       style="display: none;" role="menu" aria-orientation="vertical" aria-label="Academic Records Drawer">
    <div class="h-full flex">
      <!-- Left Column -->
      <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-book text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">Academic Records</h2>
        </div>
      </div>
    </div>
  </div>
</li>

<!-- Attendance Menu Item -->
<li class="relative w-full"
    @mouseenter="openDropdown = 'attendanceMenu'"
    @mouseleave="openDropdown = (openDropdown === 'attendanceMenu') ? null : openDropdown"
    style="list-style-type: none;">
  <div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
    <i class="fas fa-calendar-check text-xl mr-3"></i>
    <span class="text-sm flex items-center">Attendance</span>
    <i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
       :class="{'rotate-180': openDropdown === 'attendanceMenu'}"></i>
  </div>

  <!-- Attendance Drawer -->
  <div x-show="openDropdown === 'attendanceMenu'"
       @click.away="openDropdown = null"
       x-transition:enter="transition ease-out duration-150"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in duration-100"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
       style="display: none;" role="menu" aria-orientation="vertical" aria-label="Attendance Drawer">
    <div class="h-full flex">
      <!-- Left Column -->
      <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-calendar-check text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">Attendance</h2>
        </div>

        <!-- Quick Links or Favorites for Attendance -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Attendance Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">View Attendance</li>
              <li class="cursor-pointer hover:underline">Edit Attendance</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</li>

<!-- Behavior Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'behaviorMenu'"
@mouseleave="openDropdown = (openDropdown === 'behaviorMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-user-shield text-xl mr-3"></i>
<span class="text-sm flex items-center">Behavior</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'behaviorMenu'}"></i>
</div>

<!-- Behavior Drawer -->
<div x-show="openDropdown === 'behaviorMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Behavior Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-user-shield text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Behavior</h2>
    </div>
    <div class="flex-1 overflow-y-auto text-sm text-gray-800">
      <div class="mb-8">
        <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
          <i class="fas fa-star w-5 text-yellow-500"></i>
          <span>My Behavior Favorites</span>
        </h3>
        <ul class="ml-6 list-disc text-gray-600 space-y-1">
          <li class="cursor-pointer hover:underline">View Behavior</li>
          <li class="cursor-pointer hover:underline">Edit Behavior</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</li>

<!-- Compliance Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'complianceMenu'"
@mouseleave="openDropdown = (openDropdown === 'complianceMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-file-alt text-xl mr-3"></i>
<span class="text-sm flex items-center">Compliance</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'complianceMenu'}"></i>
</div>

<!-- Compliance Drawer -->
<div x-show="openDropdown === 'complianceMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Compliance Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-file-alt text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Compliance</h2>
    </div>
  </div>
</div>
</div>
</li>

<!-- Schedule Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'scheduleMenu'"
@mouseleave="openDropdown = (openDropdown === 'scheduleMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-calendar-day text-xl mr-3"></i>
<span class="text-sm flex items-center">Schedule</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'scheduleMenu'}"></i>
</div>

<!-- Schedule Drawer -->
<div x-show="openDropdown === 'scheduleMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Schedule Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-calendar-day text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Schedule</h2>
    </div>
  </div>
</div>
</div>
</li>

<!-- Data Exchange Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'dataExchangeMenu'"
@mouseleave="openDropdown = (openDropdown === 'dataExchangeMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-exchange-alt text-xl mr-3"></i>
<span class="text-sm flex items-center">Data Exchange</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'dataExchangeMenu'}"></i>
</div>

<!-- Data Exchange Drawer -->
<div x-show="openDropdown === 'dataExchangeMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Data Exchange Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-exchange-alt text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Data Exchange</h2>
    </div>
  </div>
</div>
</div>
</li>

<!-- Wellness Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'wellnessMenu'"
@mouseleave="openDropdown = (openDropdown === 'wellnessMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-heartbeat text-xl mr-3"></i>
<span class="text-sm flex items-center">Wellness</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'wellnessMenu'}"></i>
</div>

<!-- Wellness Drawer -->
<div x-show="openDropdown === 'wellnessMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Wellness Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-heartbeat text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Wellness</h2>
    </div>
  </div>
</div>
</div>
</li>

<!-- Postsecondary Readiness Menu Item -->
<li class="relative w-full"
@mouseenter="openDropdown = 'postsecondaryReadinessMenu'"
@mouseleave="openDropdown = (openDropdown === 'postsecondaryReadinessMenu') ? null : openDropdown"
style="list-style-type: none;">
<div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
<i class="fas fa-graduation-cap text-xl mr-3"></i>
<span class="text-sm flex items-center">Postsecondary Readiness</span>
<i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
   :class="{'rotate-180': openDropdown === 'postsecondaryReadinessMenu'}"></i>
</div>

<!-- Postsecondary Readiness Drawer -->
<div x-show="openDropdown === 'postsecondaryReadinessMenu'"
   @click.away="openDropdown = null"
   x-transition:enter="transition ease-out duration-150"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-100"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
   class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
   style="display: none;" role="menu" aria-orientation="vertical" aria-label="Postsecondary Readiness Drawer">
<div class="h-full flex">
  <div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">
    <div class="flex items-center space-x-3 mb-2">
      <div class="p-2 rounded-full bg-blue-100 text-blue-600">
        <i class="fas fa-graduation-cap text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-700">Postsecondary Readiness</h2>
    </div>
  </div>
</div>
</div>
</li>

</nav>