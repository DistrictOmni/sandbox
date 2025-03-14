<ul class="w-full">
    <!-- Home (Active) -->
    <a href="/">
    <li class="flex flex-col items-center justify-center w-full h-20 
               p-3 border-l-4 border-blue-600 cursor-pointer
               bg-gray-300 text-black 
               hover:bg-gray-200 transition-colors">
        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
        <span class="text-sm mt-1">Home</span>
    </li></a>
<?php
     require_once 'Modules/People.php'; 
     require_once 'Modules/Courses.php'; 
     require_once 'Modules/Health.php'; 
     //require_once 'Modules/SpEd.php'; 
     //require_once 'Modules/Nutrition.php'; 
     //require_once 'Modules/Transportation.php'; 
     //require_once 'Modules/Facilities.php'; 
     //require_once 'Modules/Finance.php'; 
     //require_once 'Modules/Library.php'; 
     //require_once 'Modules/Athletics.php'; 
     require_once 'Modules/Analytics.php'; 
     require_once 'Modules/Admin.php'; 
     require_once 'Modules/More.php'; 
?>
  
</ul>