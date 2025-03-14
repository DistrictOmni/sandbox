<!-- Student Profile -->
<li class="relative w-full"
    @mouseenter="openDropdown = 'studentProfileMenu'"
    @mouseleave="openDropdown = (openDropdown === 'studentProfileMenu') ? null : openDropdown"
    style="list-style-type: none;">
  <div class="flex items-center w-full h-12 p-3 cursor-pointer text-gray-700 hover:bg-gray-200 hover:text-blue-600 transition-colors rounded-md">
    <i class="fas fa-user text-xl mr-3"></i>
    <span class="text-sm flex items-center">Student Profile</span>
    <i class="fas fa-chevron-right text-xs ml-auto transition-transform duration-300"
       :class="{'rotate-180': openDropdown === 'studentProfileMenu'}"></i>
  </div>

<!-- Student Profile Drawer -->
<div x-show="openDropdown === 'studentProfileMenu'"
 @click.away="openDropdown = null"
 x-transition:enter="transition ease-out duration-150"
 x-transition:enter-start="opacity-0"
 x-transition:enter-end="opacity-100"
 x-transition:leave="transition ease-in duration-100"
 x-transition:leave-start="opacity-100"
 x-transition:leave-end="opacity-0"
 class="fixed top-32 bottom-0 left-64 ml-20 bg-white shadow-xl z-50 overflow-auto"
 style="display: none;" role="menu" aria-orientation="vertical" aria-label="Student Profile Drawer">
<div class="h-full flex">
<!-- Left Column - Wider for two rows -->
<div class="flex-shrink-0 w-96 h-full flex flex-col border-r border-gray-200 bg-gradient-to-br from-white to-gray-50 p-4">

  <!-- Header Section -->
  <div class="flex items-center space-x-3 mb-4">
    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
      <i class="fas fa-user text-xl"></i>
    </div>
    <h2 class="text-2xl font-bold text-gray-700">Student Profile</h2>
  </div>

  <!-- Profile Completion Progress -->
  <div class="mb-6">
    <h3 class="text-gray-700 font-semibold text-sm">Profile Completion</h3>
    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
      <div class="bg-blue-500 h-2.5 rounded-full" style="width: 75%"></div>
    </div>
    <p class="text-xs text-gray-500">75% complete</p>
  </div>

  <!-- Action Buttons Section - Two Rows of Buttons -->
  <div class="grid grid-cols-2 gap-4 mb-8">
    
    <!-- Row 1 (First Column of Actions) -->
    <div class="space-y-3">
    <a href="/people/student/view/idnumber/quick-peek" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
  <i class="fas fa-eye text-gray-600"></i>
  <span class="text-sm">Quick Peek</span>
</a>

      <a href="/people/student/view/idnumber/demographics" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
  <i class="fas fa-id-card text-gray-600"></i>
  <span class="text-sm">Demographics</span>
</a>
<a href="/people/student/view/idnumber/schedule" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
  <i class="fas fa-calendar-day text-gray-600"></i>
  <span class="text-sm">View Schedule</span>
</a>

    </div>

 <!-- Row 2 (Second Column of Actions) -->
<div class="space-y-3">
  <button class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-3">
  <i class="fas fa-file-alt text-gray-600 text-lg"></i> <!-- Icon with consistent size -->
  <span class="text-sm text-gray-600">View Transcript</span> <!-- Consistent label styling -->
</button>

  <button class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
    <i class="fas fa-calendar-check text-gray-600"></i> <!-- Corrected icon for Attendance -->
    <span class="text-sm">View Attendance</span>
  </button>
  <button class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
    <i class="fas fa-unlock-alt text-gray-600"></i> <!-- Corrected icon for Portal Access -->
    <span class="text-sm">Portal Access</span>
  </button>
</div>

  </div>

<!-- Contact Information Section -->
<div class="mb-8">
  <h3 class="text-blue-600 text-lg font-semibold mb-2 flex items-center space-x-2">
    <span>Contact Information</span>
  </h3>
  
  <!-- Two-column grid for contact sections -->
  <div class="grid grid-cols-2 gap-4">

    <!-- Left Column: Addresses & Emails -->
    <div class="space-y-3">
      <a href="/people/student/view/idnumber/addresses" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-map-marker-alt text-gray-600"></i>
        <span class="text-sm">Addresses</span>
      </a>
      <a href="/people/student/view/idnumber/emails" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-envelope text-gray-600"></i>
        <span class="text-sm">Emails</span>
      </a>
      <a href="/people/student/view/idnumber/phones" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-phone text-gray-600"></i>
        <span class="text-sm">Phones</span>
      </a>
    </div>

    <!-- Right Column: Phones, Contacts, Family Members, Guardians -->
    <div class="space-y-3">
      <a href="/people/student/view/idnumber/contacts" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-address-book text-gray-600"></i>
        <span class="text-sm">Contacts</span>
      </a>
      <a href="/people/student/view/idnumber/family" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-users text-gray-600"></i>
        <span class="text-sm">Family Members</span>
      </a>
      <a href="/people/student/view/idnumber/guardians" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-child text-gray-600"></i>
        <span class="text-sm">Guardians</span>
      </a>
    </div>
  </div>
</div>

<!-- More Section -->
<div class="mb-8">
  <h3 class="text-blue-600 text-lg font-semibold mb-2 flex items-center space-x-2">
    <span>More</span>
  </h3>
  
  <!-- Two-column grid for More options -->
  <div class="grid grid-cols-2 gap-4">

    <!-- Left Column: Modify Info, Student Photo, Locker Info -->
    <div class="space-y-3">
      <a href="/people/student/view/idnumber/modify-info" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-edit text-gray-600"></i>
        <span class="text-sm">Modify Info</span>
      </a>
      <a href="/people/student/view/idnumber/photo" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-camera text-gray-600"></i>
        <span class="text-sm">Student Photo</span>
      </a>
      <a href="/people/student/view/idnumber/locker-info" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-lock text-gray-600"></i>
        <span class="text-sm">Locker Info</span>
      </a>
    </div>

    <!-- Right Column: Documents, Lunch Program, Student Alerts, Transportation -->
    <div class="space-y-3">
      <a href="/people/student/view/idnumber/documents" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-file-alt text-gray-600"></i>
        <span class="text-sm">Documents</span>
      </a>
      <a href="/people/student/view/idnumber/lunch-program" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-utensils text-gray-600"></i>
        <span class="text-sm">Lunch Program</span>
      </a>
      <a href="/people/student/view/idnumber/alerts" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-bell text-gray-600"></i>
        <span class="text-sm">Student Alerts</span>
      </a>
      <a href="/people/student/view/idnumber/transportation" class="w-full text-left bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md flex items-center space-x-2">
        <i class="fas fa-bus text-gray-600"></i>
        <span class="text-sm">Transportation</span>
      </a>
    </div>
  </div>
</div>


  
</div>
</div>
</div>


</li>