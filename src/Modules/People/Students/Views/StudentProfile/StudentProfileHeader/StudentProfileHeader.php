 <!-- Left portion: Student details -->
 <div class="flex items-center space-x-6">
    <!-- Student Profile Picture -->
    <img src="https://via.placeholder.com/100" alt="Student Picture" class="w-16 h-16 rounded-full border-2 border-gray-400">

    <div>
      <h1 class="text-2xl font-semibold text-gray-800">TTesting, TTester (1/4)</h1>
      <div class="text-sm text-gray-600">
        <p>Student Number: <span class="font-medium">12345</span></p>
        <p>DOB: <span class="font-medium">05/05/2012</span> | Age: <span class="font-medium">11 yrs</span></p>
      </div>
    </div>
  </div>

  <!-- Right portion: Year, Class, Alerts, and Quick Actions -->
  <div class="flex items-center space-x-10 text-gray-800">

    <!-- Alerts Section -->
    <div class="relative">
      <button class="flex items-center space-x-2 py-2 px-4 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none">
        <i class="fas fa-exclamation-circle text-xl"></i>
        <span class="text-sm">Alerts</span>
        <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full px-1 py-0.5">3</span>
      </button>
    </div>

    <!-- Year & Class Info -->
    <div class="text-lg font-medium text-gray-700">
      <div>Primavera K-5</div>
      <div>23-24 Year</div>
    </div>

    <!-- Quick Actions -->
    <div class="flex space-x-4">
      <button class="flex items-center space-x-2 py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
        <i class="fas fa-edit text-xl"></i>
        <span class="text-sm">Quick Actions</span>
      </button>
      <button class="flex items-center space-x-2 py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
        <i class="fas fa-cogs text-xl"></i>
        <span class="text-sm">Settings</span>
      </button>
    </div>

  </div>