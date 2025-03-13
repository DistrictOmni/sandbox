<!DOCTYPE html>
<html>
<head>
  <title>My Secure Area</title>
  <!-- Tailwind CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet"
  />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <!-- Alpine.js (for simple dropdown toggles) -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">

<!-- FIXED HEADER -->
<header class="fixed top-0 left-0 right-0 bg-blue-900 text-white h-12 flex items-center z-50 px-4">
  <!-- Left: Logo + Title -->
  <div class="flex items-center space-x-2">
<!-- Left: App Launcher + Title -->
<div class="flex items-center px-4 space-x-2 relative" x-data="{ open: false }">
  <!-- App Launcher Button -->
  <button
    @click="open = !open"
    class="focus:outline-none flex items-center space-x-1"
  >
    <i class="fas fa-grip-dots text-2xl"></i>
    <!-- Optional label for larger screens -->
    <span class="hidden sm:inline text-sm font-semibold">Apps</span>
  </button>

  <!-- Title -->
  <span class="font-semibold text-lg">DistrictOmni SIS</span>

  <!-- Apps Dropdown -->
  <div
    x-show="open"
    @click.away="open = false"
    class="absolute left-0 top-full mt-2 w-64 bg-white border border-gray-200 shadow-lg p-4 text-sm text-black z-50"
  >
    <p class="font-bold mb-2">Available Apps</p>
    <div class="grid grid-cols-3 gap-2">
      <!-- Example app links (customize to suit your needs) -->
      <a href="/gradebook" class="flex flex-col items-center space-y-1 text-center">
        <i class="fas fa-book"></i>
        <span class="text-xs">Gradebook</span>
      </a>
      <a href="/attendance" class="flex flex-col items-center space-y-1 text-center">
        <i class="fas fa-user-check"></i>
        <span class="text-xs">Attendance</span>
      </a>
      <a href="/scheduling" class="flex flex-col items-center space-y-1 text-center">
        <i class="fas fa-calendar-alt"></i>
        <span class="text-xs">Scheduling</span>
      </a>
      <!-- Add more icons/apps as needed -->
    </div>
  </div>
</div>

    <div class="fixed top-20 right-0 m-8 p-3 text-xs font-mono text-white h-6 w-6 rounded-full flex items-center justify-center bg-gray-700 sm:bg-pink-500 md:bg-orange-500 lg:bg-green-500 xl:bg-blue-500">
        <div class="block  sm:hidden md:hidden lg:hidden xl:hidden">al</div>
        <div class="hidden sm:block  md:hidden lg:hidden xl:hidden">sm</div>
        <div class="hidden sm:hidden md:block  lg:hidden xl:hidden">md</div>
        <div class="hidden sm:hidden md:hidden lg:block  xl:hidden">lg</div>
        <div class="hidden sm:hidden md:hidden lg:hidden xl:block">xl</div>
      </div>
    <!-- DEV ENV Indicator & Dropdown -->
<div class="relative" x-data="{ open: false }">
  <button
    @click="open = !open"
    class="flex items-center text-xs font-semibold bg-red-600 hover:bg-red-700 px-2 py-1 rounded"
  >
    <i class="fas fa-exclamation-triangle mr-1"></i>
    <span>DEV</span>
  </button>
  <!-- Dropdown anchored to the LEFT of the button -->
  <div
    x-show="open"
    @click.away="open = false"
    class="absolute top-full left-0 mt-2 w-96 bg-white border border-gray-200 shadow-lg p-4 text-sm text-black z-50"
  >
    <!-- Your dev info & actions here -->
    <div class="flex justify-between items-center">
      <p class="font-bold">Development Environment</p>
      <button
        onclick="location.reload()"
        class="text-xs text-blue-600 hover:underline"
      >
        Refresh
      </button>
    </div>
    <hr class="my-2" />
    <div class="grid grid-cols-2 gap-4">
      <!-- System Information -->
      <div>
        <p><strong>Host:</strong> <?= $_SERVER['HTTP_HOST'] ?? 'Unknown' ?></p>
        <p><strong>PHP Version:</strong> <?= PHP_VERSION ?></p>
        <p><strong>App Env:</strong> <?= $_ENV['APP_ENV'] ?? 'development' ?></p>
        <p><strong>Debug Mode:</strong> <?= (!empty($_ENV['APP_DEBUG']) && $_ENV['APP_DEBUG'] === 'true') ? 'On' : 'Off' ?></p>
        <p><strong>Timezone:</strong> <?= date_default_timezone_get() ?></p>
      </div>
      <!-- Database & Runtime Information -->
      <div>
        <p><strong>DB Connection:</strong> <?= $_ENV['DB_CONNECTION'] ?? 'N/A' ?></p>
        <p><strong>DB Host:</strong> <?= $_ENV['DB_HOST'] ?? 'N/A' ?></p>
        <p><strong>DB Name:</strong> <?= $_ENV['DB_DATABASE'] ?? 'N/A' ?></p>
        <p><strong>Memory Usage:</strong> <?= round(memory_get_usage() / 1048576, 2) ?> MB</p>
      </div>
    </div>
    <hr class="my-2" />
    <!-- Actions -->
    <div>
      <p class="font-semibold mb-1">Actions</p>
      <ul class="space-y-1">
        <li>
          <a href="/dev/logs" class="text-blue-600 hover:underline text-xs"
            ><i class="fas fa-file-alt mr-1"></i>View Logs</a
          >
        </li>
        <li>
          <a href="/dev/clear-cache" class="text-blue-600 hover:underline text-xs"
            ><i class="fas fa-broom mr-1"></i>Clear Cache</a
          >
        </li>
        <li>
          <a href="/dev/deploy" class="text-blue-600 hover:underline text-xs"
            ><i class="fas fa-sync-alt mr-1"></i>Trigger Deploy</a
          >
        </li>
        <li>
          <a href="/dev/system-info" class="text-blue-600 hover:underline text-xs"
            ><i class="fas fa-info-circle mr-1"></i>System Info</a
          >
        </li>
      </ul>
    </div>
  </div>
</div>


  </div>

  <!-- Center: Responsive Search Bar
       Start narrow on mobile, widen progressively on larger screens -->
  <div 
    class="absolute left-1/2 transform -translate-x-1/2
            w-40 sm:w-48 md:w-56 lg:w-80 xl:w-96" 
  >
    <div class="relative">
      <input
        type="text"
        class="w-full rounded-md border border-gray-300 pl-3 pr-10 py-2 text-sm text-gray-700
               placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Search"
      />
      <button
        class="absolute right-2 top-0 bottom-0 flex items-center text-gray-500 hover:text-gray-700"
      >
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>

  <!-- Right side: School/Term Selectors, DEV indicator, etc. -->
  <div class="ml-auto flex items-center space-x-4">
    <!-- Container: hidden on small screens; appears on md+ -->
    <div class="hidden md:flex md:flex-col lg:flex-row md:items-end lg:items-center md:space-y-1 lg:space-y-0 lg:space-x-2">
      <!-- SCHOOL SELECTOR -->
      <div class="relative" id="schoolDropdown">
        <button
          id="schoolBtn"
          class="flex items-center justify-end text-xs font-semibold hover:underline focus:outline-none"
        >
          <span id="schoolBtnLabel" class="text-right">Apple Grove High School</span>
          <i class="fas fa-caret-down ml-1"></i>
        </button>
        <!-- School Dropdown Menu -->
        <div
          id="schoolMenu"
          class="hidden absolute right-0 mt-1 w-56 bg-white border border-gray-200 shadow-lg z-50 text-black text-sm"
        >
          <ul class="p-2">
            <li class="mb-1 font-semibold text-gray-600">District 1</li>
            <ul class="ml-4 mb-2 space-y-1">
              <li
                class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                data-school="Apple Grove High School"
              >
                Apple Grove High School
              </li>
              <li
                class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                data-school="Pine Valley Middle"
              >
                Pine Valley Middle
              </li>
              <li
                class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                data-school="Redwood Elementary"
              >
                Redwood Elementary
              </li>
            </ul>
            <li class="mb-1 font-semibold text-gray-600">District 2</li>
            <ul class="ml-4 space-y-1">
              <li
                class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                data-school="Brookside High"
              >
                Brookside High
              </li>
              <li
                class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                data-school="Cedar Crest Elementary"
              >
                Cedar Crest Elementary
              </li>
            </ul>
          </ul>
        </div>
      </div>

      <!-- TERM SELECTOR (Multi-Step) -->
      <div class="relative" id="termDropdown">
        <button
          id="termBtn"
          class="flex items-center justify-end text-xs font-semibold hover:underline focus:outline-none"
        >
          <span id="termBtnLabel" class="text-right">22-23 Semester 2</span>
          <i class="fas fa-caret-down ml-1"></i>
        </button>
        <!-- Term Dropdown Menu (3-step selection) -->
        <div
          id="termMenu"
          class="hidden absolute right-0 mt-1 w-56 bg-white border border-gray-200 shadow-lg z-50 text-black text-sm p-3 space-y-3"
        >
          <!-- Step 1: Select Year -->
          <div id="stepYear" class="space-y-2">
            <h3 class="font-semibold text-gray-700">Select Year</h3>
            <ul id="yearList" class="space-y-1"></ul>
          </div>
          <!-- Step 2: Select Semester -->
          <div id="stepSemester" class="space-y-2 hidden">
            <button id="backToYear" class="text-xs text-blue-600 hover:underline">
              &larr; Back
            </button>
            <h3 class="font-semibold text-gray-700">Select Semester</h3>
            <ul id="semesterList" class="space-y-1"></ul>
          </div>
          <!-- Step 3: Select Quarter -->
          <div id="stepQuarter" class="space-y-2 hidden">
            <button id="backToSemester" class="text-xs text-blue-600 hover:underline">
              &larr; Back
            </button>
            <h3 class="font-semibold text-gray-700">Select Quarter</h3>
            <ul id="quarterList" class="space-y-1"></ul>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Help Icon -->
    <i class="fas fa-question-circle"></i>

    <!-- Profile/Avatar or Initials -->
    <div class="w-8 h-8 flex items-center justify-center rounded-full border border-white">
      AB
    </div>
  </div>
</header>

<!-- Top Spacing for Fixed Header -->
<div class="h-12"></div>

<main class="p-4">
  <?= $content; // The view content is injected here ?>
</main>

<footer class="mt-10 p-4 text-center text-sm text-gray-600">
  <p>&copy; <?= date('Y'); ?> My Secure Application</p>
</footer>

</body>
</html>
