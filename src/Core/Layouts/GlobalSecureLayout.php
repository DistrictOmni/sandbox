<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Secure Area - No Alpine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Tailwind CSS (CDN) -->
  <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
  />

  <!-- Font Awesome (CDN) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />

  <!-- Custom scrollbar styling (WebKit-based) -->
  <style>
    aside::-webkit-scrollbar {
      width: 6px;
    }
    aside::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    aside::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 3px;
    }
    aside::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

  </style>
</head>
<body class="bg-gray-100">

  <!-- HEADER (fixed at top) -->
  <header 
    class="fixed top-0 left-0 right-0 h-12 bg-gray-800 text-white 
           flex items-center justify-center px-4 z-50 relative"
  >
    <!-- Left: App Launcher -->
    <div class="absolute top-0 left-0 w-20 h-12 flex items-center justify-center bg-gray-800">
      <!-- App Launcher Button -->
      <div class="relative inline-block">
        <!-- Button with 3x3 Dots -->
        <button 
          id="appsLauncherBtn"
          class="p-3"
          >
          <!-- Dot Grid -->
          <div class="w-6 h-6 grid grid-cols-3 grid-rows-3 gap-1 text-white">
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
            <span class="block w-full h-full rounded-full bg-current transform transition-transform group-hover:scale-125"></span>
          </div>
        </button>

        <div 
        id="appsDropdown"
        class="hidden absolute left-0 mt-2 max-h-96 w-96 bg-white text-black rounded-lg shadow-lg z-50 
               opacity-0 scale-95 transition transform origin-top-left duration-150 ease-out"
      >
        <!-- Arrow pointer -->
        <div class="absolute -top-2 left-4 w-4 h-4 bg-white transform rotate-45"></div>
      
        <!-- SEARCH BAR (stays visible at top) -->
        <div class="border-b p-3">
          <input 
            id="appsSearch"
            type="text" 
            placeholder="Search apps..."
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-400"
          />
        </div>
      
        <!-- Scroll wrapper just for the grid -->
        <div class="overflow-auto" style="max-height: calc(24rem - 4.5rem);">
          <!-- GRID OF APPS -->
          <div id="appsGrid" class="grid grid-cols-4 gap-4 p-4">
            <!-- your tiles inserted by JS -->
          </div>
        </div>
      </div>
      
      </div>
    </div>

    <!-- Vanilla JS for Apps Dropdown -->
    <script>
      // Our list of apps
      const appsData = [
  { name: 'People',     icon: 'fas fa-users',              color: 'bg-blue-500',   link: '#' },
  { name: 'Academics',  icon: 'fas fa-book',               color: 'bg-green-500',  link: '#' },
  { name: 'Gradebook',  icon: 'fas fa-clipboard-list',     color: 'bg-pink-500',   link: '#' },
  { name: 'SpEd',       icon: 'fas fa-chalkboard-teacher', color: 'bg-yellow-500', link: '#' },
  { name: 'Wellness',   icon: 'fas fa-heart',              color: 'bg-red-500',    link: '#' },
  { name: 'Finance',    icon: 'fas fa-dollar-sign',        color: 'bg-indigo-500', link: '#' },
  { name: 'Admin',      icon: 'fas fa-user-cog',           color: 'bg-purple-500', link: '#' },
  { name: 'Facilities', icon: 'fas fa-building',           color: 'bg-gray-500',   link: '#' },
  { name: 'Reports',    icon: 'fas fa-chart-bar',          color: 'bg-blue-700',   link: '#' },
  { name: 'Settings',   icon: 'fas fa-cog',                color: 'bg-green-700',  link: '#' },
];


      // Retrieve DOM elements
      const appsLauncherBtn = document.getElementById('appsLauncherBtn');
      const appsDropdown    = document.getElementById('appsDropdown');
      const appsSearch      = document.getElementById('appsSearch');
      const appsGrid        = document.getElementById('appsGrid');

      let dropdownOpen = false; // track open/closed state

      // Toggle dropdown on button click
      appsLauncherBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // avoid immediate close
        dropdownOpen ? hideDropdown() : showDropdown();
      });

      // Close if click outside
      document.addEventListener('click', (e) => {
        if (!appsLauncherBtn.contains(e.target) && !appsDropdown.contains(e.target)) {
          hideDropdown();
        }
      });

      function showDropdown() {
        appsDropdown.classList.remove('hidden');
        appsDropdown.getBoundingClientRect(); // force reflow
        appsDropdown.classList.remove('opacity-0', 'scale-95');
        appsDropdown.classList.add('opacity-100', 'scale-100');
        dropdownOpen = true;
      }

      function hideDropdown() {
        appsDropdown.classList.remove('opacity-100', 'scale-100');
        appsDropdown.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
          appsDropdown.classList.add('hidden');
        }, 150);
        dropdownOpen = false;
      }

      // Listen for input changes in the search box
      appsSearch.addEventListener('input', renderApps);

      // Render apps to the grid (filtering by search query)
      function renderApps() {
        const query = appsSearch.value.trim().toLowerCase();
        const filtered = query
          ? appsData.filter(a => a.name.toLowerCase().includes(query))
          : appsData;

        // Clear existing
        appsGrid.innerHTML = '';

        // Build each tile
        filtered.forEach(app => {
          const tile = document.createElement('a');
          tile.href = app.link;
          tile.className = 'flex flex-col items-center space-y-2 group';

          // Icon wrapper
          const iconWrapper = document.createElement('div');
          iconWrapper.className = `w-16 h-16 rounded-full flex items-center justify-center text-white transition-opacity group-hover:opacity-90 ${app.color}`;
          
          const icon = document.createElement('i');
          icon.className = `text-3xl ${app.icon}`;
          iconWrapper.appendChild(icon);

          // Name
          const nameSpan = document.createElement('span');
          nameSpan.className = 'text-sm text-gray-700 font-medium group-hover:text-gray-900 transition-colors';
          nameSpan.textContent = app.name;

          tile.appendChild(iconWrapper);
          tile.appendChild(nameSpan);
          appsGrid.appendChild(tile);
        });
      }

      // Initial render
      renderApps();
    </script>


  <!-- REPLACE your existing "Center: Search Bar" with this -->
  <div 
  class="sm:block w-40 sm:w-48 md:w-56 lg:w-80 xl:w-96"
  style="
    position: absolute; 
    top: 0; 
    bottom: 0;
    left: 50%; 
    transform: translateX(-50%); 
    display: flex; 
    align-items: center;
  "
>
  <!-- Desktop Search (hidden below sm) -->
  <div class="hidden sm:block">
    <input 
      class="w-full p-1 rounded text-gray-800" 
      type="text" 
      placeholder="Search..." 
    />
  </div>

  <!-- Mobile Title (hidden at sm+) -->
  <div class="sm:hidden absolute inset-0 flex items-center bg-gray-800 px-2">
    <span class="text-white font-bold text-sm">
      My App Title
    </span>
  </div>
</div>

<!-- Desktop-only Search Bar -->
<div class="hidden sm:block w-40 sm:w-48 md:w-56 lg:w-80 xl:w-96">
    <input 
      class="w-full p-1 rounded text-gray-800" 
      type="text" 
      placeholder="Search..." 
      name="search"
    />
  </div>
  
  <!-- Mobile-only Search Icon (left of screen, hugging the app launcher) -->
  <div class="sm:hidden absolute top-0 left-20 h-12 flex items-left bg-gray-800">
    <button id="mobileSearchBtn" class="">
      <i class="fas fa-search"></i>
    </button>
   
  </div>
<!-- MOBILE-ONLY SEARCH DROPDOWN -->
<div 
  id="mobileSearchDropdown"
  class="hidden absolute top-12 left-0 right-0 bg-white p-3 shadow z-50"
>
  <!-- The actual text field -->
  <input
    id="mobileSearchInput"
    class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-400"
    type="text"
    placeholder="Search..."
  />

  <!-- DEFAULT LANDING (shown initially if no input) -->
  <div 
    id="mobileDefaultLanding" 
    class="mt-2 text-center text-gray-500"
  >
    <p>Start typing to see suggestions or search helpful hints and tricks</p>
    <!-- Optional graphic or icon -->
    <img 
      src="some-placeholder.png" 
      alt="search help" 
      class="mx-auto mt-3 w-16 h-16 object-contain"
    />
  </div>

  <!-- ACTUAL SUGGESTIONS (hidden until user types) -->
  <ul 
    id="mobileSuggestions"
    class="mt-2 text-gray-800 hidden"
  ></ul>
</div>

<script>
  // Example list of possible autocomplete strings:
  const allSuggestions = [
    'Apple', 'Banana', 'Blueberry',
    'Cherry', 'Date', 'Grapes',
    'Kiwi', 'Mango', 'Orange'
  ];

  const mobileSearchInput    = document.getElementById('mobileSearchInput');
  const mobileDefaultLanding = document.getElementById('mobileDefaultLanding');
  const mobileSuggestions    = document.getElementById('mobileSuggestions');

  // Whenever user types:
  mobileSearchInput.addEventListener('input', () => {
    const query = mobileSearchInput.value.trim().toLowerCase();

    // If empty => show default landing, hide suggestions
    if (!query) {
      mobileDefaultLanding.classList.remove('hidden');
      mobileSuggestions.innerHTML = '';
      mobileSuggestions.classList.add('hidden');
      return;
    }

    // Otherwise => hide default landing, show suggestions
    mobileDefaultLanding.classList.add('hidden');
    mobileSuggestions.classList.remove('hidden');

    // Filter the items that match what user typed
    const matched = allSuggestions.filter(item =>
      item.toLowerCase().includes(query)
    );

    // Build the <li> items, or show "No matches"
    if (matched.length) {
      mobileSuggestions.innerHTML = matched.map(m => 
        `<li class="py-1 px-2 hover:bg-gray-200 cursor-pointer">${m}</li>`
      ).join('');
    } else {
      mobileSuggestions.innerHTML = `
        <li class="py-1 px-2 text-gray-500 italic">
          No matches
        </li>`;
    }
  });
</script>

  <script>
    // Mobile search toggle
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearchDropdown = document.getElementById('mobileSearchDropdown');
    let mobileSearchOpen = false;
  
    // Show/hide on icon click
    mobileSearchBtn.addEventListener('click', (e) => {
      e.stopPropagation(); 
      mobileSearchOpen = !mobileSearchOpen;
      if (mobileSearchOpen) {
        mobileSearchDropdown.classList.remove('hidden');
      } else {
        mobileSearchDropdown.classList.add('hidden');
      }
    });
  
    // Close if click outside
    document.addEventListener('click', (e) => {
      if (!mobileSearchBtn.contains(e.target) && !mobileSearchDropdown.contains(e.target)) {
        mobileSearchDropdown.classList.add('hidden');
        mobileSearchOpen = false;
      }
    });
  </script>
  

    <!-- Right: Icons/Links (absolute) -->
    <div class="absolute right-4 flex items-center space-x-4">

            <!-- CTA/New (dropdown) -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 text-sm font-semibold bg-blue-800 hover:bg-blue-700
             px-2 py-1 rounded focus:outline-none focus:ring-2">
                    <i class="fas fa-plus"></i>
                    <span class="hidden sm:inline">New</span>
                    <!-- you can omit text on smaller screens -->
                </button>
                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 top-full mt-2 w-48 bg-white border border-gray-200
             shadow-md p-2 text-sm text-gray-700 z-50">
                    <p class="font-semibold text-gray-600 mb-1">Create New:</p>
                    <ul class="space-y-1">
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">Student</li>
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">Teacher</li>
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">Class</li>
                        <!-- Add more as needed -->
                    </ul>
                </div>
            </div>

            <!-- Notifications -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-gray-100 focus:outline-none" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <!-- Example: a small red notification badge -->
                    <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full
         text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                        3
                    </span>

                </button>
                <!-- Example notifications dropdown -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200
             shadow-md p-2 text-sm text-gray-700 z-50">
                    <p class="font-semibold text-gray-600 mb-2">Notifications</p>
                    <ul class="space-y-2">
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">You have 2 new messages</li>
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">Upcoming staff meeting at 3pm</li>
                        <!-- Add more as needed -->
                    </ul>
                </div>
            </div>

            <!-- Messages/Inbox -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-gray-100 focus:outline-none" title="Messages">
                    <i class="fas fa-envelope"></i>
                    <!-- Badge Example -->
                    <span class="absolute top-0 right-0 bg-green-500 text-white rounded-full
         text-xs px-1 leading-tight transform translate-x-1/2 -translate-y-1/2">
                        5
                    </span>
                </button>
                <!-- Example messages dropdown -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200
             shadow-md p-2 text-sm text-gray-700 z-50">
                    <p class="font-semibold text-gray-600 mb-2">Inbox</p>
                    <ul class="space-y-2">
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                            Message from Principal
                        </li>
                        <li class="hover:bg-gray-100 px-2 py-1 cursor-pointer">
                            Parent Inquiry
                        </li>
                        <!-- More messages -->
                    </ul>
                </div>
            </div>

            <!-- Profile/Avatar with advanced dropdown -->
            <div class="relative" x-data="{ open: false, statusMenuOpen: false, currentStatus: 'Active' }"
                @keydown.escape="open = false">
                <!-- Avatar Button -->
                <button @click="open = !open" class="relative w-10 h-10 rounded-full border-2 border-transparent
         hover:border-blue-400 focus:border-blue-400 focus:outline-none
         flex items-center justify-center bg-gray-200">
                    <!-- Avatar (image or fallback initials) -->
                    <span class="font-bold text-gray-700">AB</span>


                    <!-- Status dot in top-right corner, for example -->
                    <span class="absolute top-0 right-0 
           h-3 w-3 rounded-full bg-green-500 
           ring-2 ring-white"></span>
                </button>


                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95" class="absolute right-0 mt-2 w-72 bg-white border border-gray-200 rounded-lg
         shadow-lg py-3 z-50" role="menu" aria-orientation="vertical" aria-label="Profile Menu">
                    <!-- Top bar with Company Name + Chevron + Sign Out -->
                    <div class="px-4 pb-2 flex items-center justify-between" x-data="{ openCompany: false }"
                        @keydown.escape="openCompany = false">
                        <!-- Company Name + Chevron (click to open dropdown) -->
                        <div class="relative">
                            <button @click="openCompany = !openCompany" class="flex items-center space-x-1 font-semibold text-gray-800
             hover:text-blue-600 focus:outline-none" aria-haspopup="true" :aria-expanded="openCompany">
                                <span>StarTek, Inc.</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>

                            <!-- Company Switcher Dropdown -->
                            <div x-show="openCompany" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-1" @click.away="openCompany = false"
                                class="absolute mt-2 w-60 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                <!-- Header -->
                                <div class="px-4 py-2 bg-gray-50 border-b border-gray-200">
                                    <p class="text-sm font-semibold text-gray-600">Switch Instance</p>
                                </div>

                                <!-- List of instances -->
                                <ul class="py-1 text-sm text-gray-700">
                                    <!-- Example items; add or remove as needed -->
                                    <li>
                                        <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                            <!-- Optional icon -->
                                            <i class="fas fa-building text-gray-400 mr-2"></i>
                                            <!-- Instance label -->
                                            StarTek, Inc.
                                            <!-- Optional badge or checkmark for active instance
             <span class="ml-auto text-green-500">
               <i class="fas fa-check"></i>
             </span>
        -->
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                            <i class="fas fa-industry text-gray-400 mr-2"></i>
                                            Acme Corp
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="openCompany = false" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-50 
               hover:text-blue-700 transition-colors focus:outline-none">
                                            <i class="fas fa-briefcase text-gray-400 mr-2"></i>
                                            Another Company
                                        </button>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <!-- Sign out button -->
                        <a href="/logout" class="text-sm text-red-600 border border-red-600 rounded-md px-2 py-1
           hover:bg-red-600 hover:text-white focus:outline-none">
                            Sign out
                        </a>
                    </div>

                    <!-- Horizontal divider -->
                    <hr class=" mb-3 border-gray-200">
                    <div class="px-4 pb-3 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <!-- Avatar with status dot -->
                            <div class="relative w-10 h-10 rounded-full bg-gray-300 flex-shrink-0">
                                <span class="flex items-center justify-center h-full font-bold text-white">
                                    AH
                                </span>
                                <!-- Status dot in top-right -->
                                <span class="absolute top-0 right-0 mt-0.5 mr-0.5
               h-3 w-3 rounded-full bg-green-500
               ring-2 ring-white"></span>
                            </div>

                            <!-- Text column (name, email, link, status) -->
                            <div class="leading-tight">
                                <!-- Name -->
                                <p class="font-semibold text-gray-700">
                                    Anthony Hudson
                                </p>
                                <!-- Email + “View account” -->
                                <p class="text-sm text-gray-500">
                                    Anthony.Hudson@startek.com
                                    <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                        View account
                                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <ul class="mt-2">
                        <!-- STATUS DROPDOWN ITEM -->
                        <li x-data="{ open: false, selectedStatus: 'Available' }" class="relative">
                            <!-- Trigger row styled like your other menu items -->
                            <button @click="open = !open" type="button" class="flex items-center justify-between w-full px-4 py-2 
               hover:bg-gray-50 hover:text-blue-600
               text-gray-700 text-sm transition-colors">
                                <!-- Left side: status icon + label -->
                                <div class="flex items-center">
                                    <!-- Example: show the currently selected status icon -->
                                    <template x-if="selectedStatus === 'Available'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-green-500 text-white">
                                            <i class="fas fa-check text-xs"></i>
                                        </span>
                                    </template>
                                    <template x-if="selectedStatus === 'Busy'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white">
                                            <i class="fas fa-minus text-xs"></i>
                                        </span>
                                    </template>
                                    <template x-if="selectedStatus === 'Do not disturb'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white">
                                            <i class="fas fa-ban text-xs"></i>
                                        </span>
                                    </template>
                                    <template x-if="selectedStatus === 'Be right back'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white">
                                            <i class="fas fa-coffee text-xs"></i>
                                        </span>
                                    </template>
                                    <template x-if="selectedStatus === 'Appear away'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white">
                                            <i class="fas fa-clock text-xs"></i>
                                        </span>
                                    </template>
                                    <template x-if="selectedStatus === 'Appear offline'">
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-gray-400 text-white">
                                            <i class="fas fa-times text-xs"></i>
                                        </span>
                                    </template>

                                    <!-- Status text -->
                                    <span class="ml-2" x-text="selectedStatus"></span>
                                </div>

                                <!-- Right side: down chevron -->
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200
               rounded-md shadow-lg py-1 z-50">
                                <ul class="text-sm text-gray-700" role="menu" aria-orientation="vertical">
                                    <!-- Available -->
                                    <li>
                                        <button @click="selectedStatus = 'Available'; open = false"
                                            :class="selectedStatus === 'Available' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-green-500 text-white mr-2">
                                                <i class="fas fa-check text-xs"></i>
                                            </span>
                                            Available
                                        </button>
                                    </li>
                                    <!-- Busy -->
                                    <li>
                                        <button @click="selectedStatus = 'Busy'; open = false"
                                            :class="selectedStatus === 'Busy' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white mr-2">
                                                <i class="fas fa-minus text-xs"></i>
                                            </span>
                                            Busy
                                        </button>
                                    </li>
                                    <!-- Do not disturb -->
                                    <li>
                                        <button @click="selectedStatus = 'Do not disturb'; open = false"
                                            :class="selectedStatus === 'Do not disturb' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-red-500 text-white mr-2">
                                                <i class="fas fa-ban text-xs"></i>
                                            </span>
                                            Do not disturb
                                        </button>
                                    </li>
                                    <!-- Be right back -->
                                    <li>
                                        <button @click="selectedStatus = 'Be right back'; open = false"
                                            :class="selectedStatus === 'Be right back' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white mr-2">
                                                <i class="fas fa-coffee text-xs"></i>
                                            </span>
                                            Be right back
                                        </button>
                                    </li>
                                    <!-- Appear away -->
                                    <li>
                                        <button @click="selectedStatus = 'Appear away'; open = false"
                                            :class="selectedStatus === 'Appear away' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-yellow-500 text-white mr-2">
                                                <i class="fas fa-clock text-xs"></i>
                                            </span>
                                            Appear away
                                        </button>
                                    </li>
                                    <!-- Appear offline -->
                                    <li>
                                        <button @click="selectedStatus = 'Appear offline'; open = false"
                                            :class="selectedStatus === 'Appear offline' ? 'bg-gray-100' : ''"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <span
                                                class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-gray-400 text-white mr-2">
                                                <i class="fas fa-times text-xs"></i>
                                            </span>
                                            Appear offline
                                        </button>
                                    </li>

                                    <!-- Divider -->
                                    <hr class="my-1 border-gray-200">

                                    <!-- Duration (sub-menu or next screen) -->
                                    <li>
                                        <button type="button"
                                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <div class="flex items-center">
                                                <i class="fas fa-clock text-gray-500 w-4 mr-2"></i>
                                                Duration
                                            </div>
                                            <i class="fas fa-chevron-right text-gray-400"></i>
                                        </button>
                                    </li>

                                    <!-- Reset status -->
                                    <li>
                                        <button @click="selectedStatus = 'Available'; open = false"
                                            class="flex items-center w-full px-4 py-2 hover:bg-gray-50 focus:outline-none">
                                            <i class="fas fa-undo text-gray-500 w-4 mr-2"></i>
                                            Reset status
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Another link, e.g. Account Settings -->
                        <li>
                            <a href="/account-settings" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-blue-600
               text-gray-700 text-sm transition-colors" role="menuitem">
                                <i class="fas fa-cog w-4 mr-2"></i>
                                Account Settings
                            </a>
                        </li>
                        <!-- Possibly more shortcuts... -->
                    </ul>


                    <!-- Optional advanced or grouped items -->
                    <div class="mt-2 border-t border-gray-100 pt-2">
                        <ul>
                            <li>
                                <a href="/switch-workspace" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-blue-600
                 text-gray-700 text-sm transition-colors" role="menuitem">
                                    <i class="fas fa-exchange-alt w-4 mr-2"></i>
                                    Switch Workspace
                                </a>
                            </li>
                            <li>
                                <button type="button" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-50 hover:text-blue-600
                 text-gray-700 text-sm transition-colors" role="menuitem">
                                    <i class="fas fa-adjust w-4 mr-2"></i>
                                    Dark Mode
                                    <!-- Example toggle switch -->
                                    <span class="ml-auto relative">
                                        <span class="block w-8 h-4 bg-gray-300 rounded-full shadow-inner"></span>
                                        <span class="dot absolute left-0 top-0 w-4 h-4 bg-white rounded-full shadow
                         transform transition-transform"></span>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Bottom Section: Footer with Security Info -->
                    <div class="mt-2 border-t border-gray-100 pt-2 px-4">
                        <!-- Example environment/instance & version -->
                        <p class="text-xs text-gray-500">
                            Instance: <span class="font-semibold text-gray-600">Production</span><br>
                            Version: <span class="font-semibold text-gray-600">v2.3.1</span>
                        </p>
                        <!-- Example IP / location -->
                        <p class="mt-1 text-xs text-gray-500">
                            IP: <span class="font-semibold text-gray-600">192.168.0.12</span><br>
                            Location: <span class="font-semibold text-gray-600">Austin, TX</span>
                        </p>
                    </div>
                </div>

            </div>
    </div>
  </header>

  <!-- FIXED ASIDE (Left Sidebar) -->
  <aside 
    class="fixed top-12 bottom-0 left-0 w-20 bg-gray-800 z-40 
           flex flex-col items-center select-none"
  >
    <!-- Sidebar Menu Items -->
    <ul class="w-full">
      <!-- #1: Home (Active) -->
      <li 
        class="flex flex-col items-center justify-center w-full h-20 
               p-3 border-l-4 border-blue-600 cursor-pointer
               bg-gray-300 text-black 
               hover:bg-gray-200 transition-colors"
      >
        <i class="fas fa-home text-2xl"></i>
        <span class="text-sm mt-1">Home</span>
      </li>

      <!-- #2: People (with sub-drawer) -->
      <li 
        class="relative w-full"
        onmouseenter="showDrawer('people-drawer')" 
        onmouseleave="hideDrawer('people-drawer')"
      >
        <div 
          class="flex flex-col items-center justify-center w-full h-20 
                 p-3 border-l-4 border-transparent cursor-pointer
                 text-gray-300 hover:bg-gray-700 hover:text-white 
                 hover:border-blue-400 transition-colors"
        >
          <i class="fas fa-users text-2xl"></i>
          <span class="text-sm mt-1">People</span>
        </div>
        <!-- People sub-drawer -->
        <div 
          id="people-drawer"
          class="hidden fixed top-12 bottom-0 left-20 w-64
                 bg-white shadow-xl z-50 overflow-y-auto"
        >
          <ul class="p-4 text-gray-800">
            <li class="p-2 border-b">Students</li>
            <li class="p-2 border-b">Staff</li>
            <li class="p-2 border-b">Emergency Contacts</li>
            <!-- etc. -->
          </ul>
        </div>
      </li>

      <!-- #3: More (with sub-drawer) -->
      <li 
        class="relative w-full"
        onmouseenter="showDrawer('more-drawer')" 
        onmouseleave="hideDrawer('more-drawer')"
      >
        <div 
          class="flex flex-col items-center justify-center w-full h-20 
                 p-3 border-l-4 border-transparent cursor-pointer
                 text-gray-300 hover:bg-gray-700 hover:text-white 
                 hover:border-blue-400 transition-colors"
        >
          <i class="fas fa-ellipsis-h text-2xl"></i>
          <span class="text-sm mt-1">More</span>
        </div>
        <!-- More sub-drawer -->
        <div 
          id="more-drawer"
          class="hidden fixed top-12 bottom-0 left-20 w-64
                 bg-white shadow-xl z-50 overflow-y-auto"
        >
          <ul class="p-4 text-gray-800">
            <li class="p-2 border-b">Reports</li>
            <li class="p-2 border-b">Settings</li>
            <!-- etc. -->
          </ul>
        </div>
      </li>
    </ul>
  </aside>

  <!-- MAIN CONTENT (changed from "ml-20 p-4 bg-red-100 min-h-screen overflow-y-auto") -->
  <main 
    class="fixed top-12 bottom-0 left-20 right-0 p-4 overflow-auto"
  >
    <h1 class="text-xl font-bold mb-4">Dashboard Content</h1>
    <p>
      Your main view or dashboard content goes here.
      The sidebar uses plain JavaScript for sub-drawer hover 
      (no Alpine, no group-hover).
    </p>
  </main>

  <!-- Minimal JavaScript to show/hide sub-drawers -->
  <script>
    function showDrawer(id) {
      const drawer = document.getElementById(id);
      if (drawer) drawer.classList.remove('hidden');
    }
    function hideDrawer(id) {
      const drawer = document.getElementById(id);
      if (drawer) drawer.classList.add('hidden');
    }
  </script>

  <!-- Hide sidebar on mobile & remove main’s margin below 768px -->
  <style>
    @media (max-width: 767px) {
      aside {
        display: none !important;
      }
      main {
        left: 0 !important;
        width: 100% !important;
      }
    }

    /* Match the “pretty scrollbar” rules so main also has them */
    main::-webkit-scrollbar {
      width: 6px;
    }
    main::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    main::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 3px;
    }
    main::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>
