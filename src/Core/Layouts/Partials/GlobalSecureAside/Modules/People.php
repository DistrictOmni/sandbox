    <!-- People (HOVER sub-drawer) -->
    <li class="relative w-full" @mouseenter="openDropdown = 'peopleDrawer'"
        @mouseleave="openDropdown = (openDropdown === 'peopleDrawer') ? null : openDropdown">
        <!-- Trigger for People Drawer -->
        <div class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="People Drawer">
            <i class="fas fa-users text-2xl" aria-hidden="true"></i>
            <span class="text-sm mt-1">People</span>
        </div>

        <!-- The Drawer Itself: fixed, extra wide, multi-column -->
        <div x-show="openDropdown === 'peopleDrawer'" @click.away="openDropdown = null"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;"
            role="menu" aria-orientation="vertical" aria-label="People Drawer">
            <!-- Full-height flex container -->
            <div class="h-full flex">

                <!-- LEFT COLUMN (Quick Actions, 100% height) -->
                <div class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200 
               bg-gradient-to-br from-white to-gray-50 p-4">
               <!-- Large Title: "PEOPLE & QUICK ACTIONS" -->
<div class="flex items-center space-x-3 mb-2">
  <div class="p-2 rounded-full bg-blue-100 text-blue-600">
    <i class="fas fa-users text-xl"></i>
  </div>
  <h2 class="text-2xl font-bold text-gray-700">
    People
  </h2>
</div>
<div 
  class="mb-4 relative"
  x-data="{ 
    query: '', 
    open: false,
    suggestions: [
      'John Doe','Jane Smith','Jake Johnson','Emily Davis',
      'María González','Leonardo Rossi'
    ],

    /* For the type dropdown */
    typeOpen: false,
    selectedType: 'All',
    types: ['All', 'Students', 'Staff', 'Faculty', 'Advisors', 'Parents'],
  }"
>
  <!-- Label -->
  <label for="peopleSearch" class="block text-gray-600 font-semibold mb-1 flex items-center space-x-2">
    <span>People Search</span>
  </label>

  <!-- WRAPPER for the input + appended button -->
  <div class="relative flex">
    <!-- The left icon inside the input -->
    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
      <i class="fas fa-search text-gray-400"></i>
    </span>

    <!-- Text Input -->
    <input
      id="peopleSearch"
      type="text"
      class="pl-10 pr-20 py-2 w-full border border-gray-300 rounded focus:outline-none focus:border-blue-400"
      placeholder="Type a name or ID..."
      x-model="query"
      @focus="open = true"
      @input="open = (query.trim().length > 0)"
    />

    <!-- TYPE DROPDOWN TOGGLE (Appended to input) -->
    <button
      type="button"
      class="absolute right-0 inset-y-0 bg-gray-100 border-l border-gray-300 text-gray-700 px-2 flex items-center space-x-1
             rounded-r focus:outline-none hover:bg-gray-200"
      @click.stop="typeOpen = !typeOpen"
      :aria-expanded="typeOpen ? 'true' : 'false'"
      aria-haspopup="true"
    >
      <span x-text="selectedType"></span>
      <i class="fas fa-chevron-down text-xs"></i>
    </button>

    <!-- TYPE DROPDOWN MENU -->
    <div
      x-show="typeOpen"
      @click.away="typeOpen = false"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="absolute right-0 top-full mt-1 w-28 bg-white border border-gray-200 rounded shadow z-50"
      style="display: none;"
      role="menu" 
      aria-orientation="vertical"
    >
      <ul class="py-1 text-sm text-gray-700">
        <template x-for="(t, i) in types" :key="i">
          <li>
            <button
              class="w-full text-left px-3 py-2 hover:bg-gray-50 focus:outline-none"
              @click="
                selectedType = t;
                typeOpen = false;
              "
              x-text="t"
            ></button>
          </li>
        </template>
      </ul>
    </div>
  </div>
  
  <!-- AUTO-SUGGEST DROPDOWN (for name/ID) -->
  <div
    x-show="open"
    @click.away="open = false"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute mt-1 bg-white border border-gray-200 rounded shadow z-50 w-full"
    style="display: none;"
  >
    <template x-if="query.trim().length === 0">
      <div class="p-4 text-gray-500 text-sm">
        <p>Start typing to see matches...</p>
      </div>
    </template>

    <template x-if="query.trim().length > 0">
      <ul class="max-h-60 overflow-auto divide-y divide-gray-100">
        <template 
          x-for="(item, index) in suggestions
            .filter(i => i.toLowerCase().includes(query.toLowerCase()))
            .slice(0,8)" 
          :key="index"
        >
          <li 
            class="px-3 py-2 hover:bg-gray-50 cursor-pointer flex items-center space-x-2"
            @click="
              query = item;
              open = false;
              // Possibly navigate or handle search action
            "
          >
            <i class="fas fa-user text-gray-400"></i>
            <span x-text="item"></span>
          </li>
        </template>
        <!-- If no matches -->
        <template x-if="!suggestions.some(i => i.toLowerCase().includes(query.toLowerCase()))">
          <li class="p-3 text-gray-500 text-sm">
            No matches found for "<span x-text="query"></span>"
          </li>
        </template>
      </ul>
    </template>
  </div>
</div>


                    <!-- Scrollable area for PEOPLE Quick Actions -->
<div class="flex-1 overflow-y-auto text-sm text-gray-800">





<!-- Subsection: Favorites / Bookmarks -->
<div class="mb-8">
  <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
    <i class="fas fa-star w-5 text-yellow-500"></i>
    <span>My Favorites</span>
  </h3>
  <ul class="ml-6 list-disc text-red-600 space-y-1">
    <li class="cursor-pointer hover:underline"><a href="/people/student/view">View Dummy Student</a></li>
  </ul>
</div>

<!-- Subsection: Frequent Tasks -->
<div class="mb-8">
  <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
    <i class="fas fa-tasks w-5 text-green-500"></i>
    <span>Frequent People Tasks</span>
  </h3>
  <ul class="space-y-2">
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-user-plus w-5 text-gray-500"></i>
      <span>Quick Enroll Student</span>
    </li>
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-envelope-open-text w-5 text-gray-500"></i>
      <span>Send Mass Message</span>
    </li>
  </ul>
</div>

<!-- Subsection: Advanced or Specialized Shortcuts -->
<div>
  <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
    <i class="fas fa-cogs w-5 text-gray-500"></i>
    <span>Advanced People Operations</span>
  </h3>
  <ul class="space-y-2">
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-network-wired w-5 text-gray-500"></i>
      <span>Integration Manager</span>
    </li>
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-file-import w-5 text-gray-500"></i>
      <span>Data Migration</span>
    </li>
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-sitemap w-5 text-gray-500"></i>
      <span>Workflow Approvals</span>
    </li>
    <li class="flex items-center space-x-2 p-2 bg-white rounded shadow-sm hover:bg-gray-100 cursor-pointer">
      <i class="fas fa-chart-line w-5 text-gray-500"></i>
      <span>Analytics &amp; Reporting</span>
    </li>
  </ul>
</div>

</div>

                </div>
                <!-- END LEFT COLUMN -->

                <!-- RIGHT COLUMNS (2, 3, 4) for Students, Staff, Advisors, etc. -->
                <div
                    class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
                    <!-- COLUMN 2: Students -->
                    <div>
                        <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                            <i class="fas fa-user-graduate text-blue-500"></i>
                            <span>Students</span>
                        </h2>
                        <ul class="space-y-1">
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-sign-in-alt w-5 text-gray-500"></i>
                                <span>Enrollment / Registration</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-search w-5 text-gray-500"></i>
                                <span>Class Search</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-user-check w-5 text-gray-500"></i>
                                <span>Program / Plan Management</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                                <span>Grades &amp; Transcripts</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-wallet w-5 text-gray-500"></i>
                                <span>Financial Aid</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-money-check-alt w-5 text-gray-500"></i>
                                <span>Payment / Billing</span>
                            </li>
                        </ul>
                    </div>

                    <!-- COLUMN 3: Staff & Faculty -->
                    <div>
                        <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                            <i class="fas fa-chalkboard-teacher text-blue-500"></i>
                            <span>Staff &amp; Faculty</span>
                        </h2>
                        <ul class="space-y-1">
                            <!-- Staff -->
                            <li
                                class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                                <i class="fas fa-user-tie w-5 text-gray-500"></i>
                                <span>Staff</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-id-card-alt w-5 text-gray-500"></i>
                                <span>Personal Data</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-building w-5 text-gray-500"></i>
                                <span>Position Management</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-clock w-5 text-gray-500"></i>
                                <span>Time &amp; Labor</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-money-bill-wave w-5 text-gray-500"></i>
                                <span>Payroll</span>
                            </li>

                            <!-- Faculty -->
                            <li
                                class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600 mt-2">
                                <i class="fas fa-chalkboard w-5 text-gray-500"></i>
                                <span>Faculty</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-users w-5 text-gray-500"></i>
                                <span>Class Rosters</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-marker w-5 text-gray-500"></i>
                                <span>Grade Input</span>
                            </li>
                            <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                                <i class="fas fa-tasks w-5 text-gray-500"></i>
                                <span>Workload / Scheduling</span>
                            </li>
                        </ul>
                    </div>

         <!-- COLUMN: People Reports -->
<div>
  <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
    <i class="fas fa-chart-bar text-blue-500"></i>
    <span>People Reports</span>
  </h2>

  <ul class="space-y-1">
    <!-- Enrollment & Academics -->
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
    >
      <i class="fas fa-user-check w-5 text-gray-500"></i>
      <span>Enrollment Summaries</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
      <span>Academic Standing &amp; Progress</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-award w-5 text-gray-500"></i>
      <span>Graduation Eligibility</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-user-graduate w-5 text-gray-500"></i>
      <span>Degree Completion Stats</span>
    </li>

    <!-- Advisors & Appointments -->
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600 mt-2"
    >
      <i class="fas fa-user-tie w-5 text-gray-500"></i>
      <span>Advisor Caseload &amp; Workload</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-calendar-check w-5 text-gray-500"></i>
      <span>Appointment Scheduling History</span>
    </li>

    <!-- Financial & Billing -->
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600 mt-2"
    >
      <i class="fas fa-file-invoice-dollar w-5 text-gray-500"></i>
      <span>Billing &amp; Payment Reports</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-money-bill-wave w-5 text-gray-500"></i>
      <span>Financial Aid Summary</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-file-alt w-5 text-gray-500"></i>
      <span>1098-T Access Reports</span>
    </li>

    <!-- Housing & International -->
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600 mt-2"
    >
      <i class="fas fa-bed w-5 text-gray-500"></i>
      <span>Housing Occupancy &amp; Assignments</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-building w-5 text-gray-500"></i>
      <span>Residence Management Overview</span>
    </li>

    <!-- International -->
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600 mt-2"
    >
      <i class="fas fa-globe-americas w-5 text-gray-500"></i>
      <span>International Student Stats</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-passport w-5 text-gray-500"></i>
      <span>Visa &amp; I-20 Reports</span>
    </li>
    <li 
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-plane-departure w-5 text-gray-500"></i>
      <span>Travel Requests &amp; History</span>
    </li>
  </ul>
</div>

                </div>
                <!-- END RIGHT COLUMNS -->
            </div>
        </div>
    </li>