<!DOCTYPE html>
<html lang="en" x-data="{ 
    openDropdown: null,   /* Single source for any open dropdown/drawer */
    currentStatus: 'Active'
  }" @keydown.escape.window="openDropdown = null" <!-- Close all on ESC -->
>

<head>
    <meta charset="UTF-8" />
    <title>My Secure Area - Alpine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tailwind CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- HEADER (fixed at top) -->
    <header class="fixed top-0 left-0 right-0 h-12 bg-gray-800 text-white z-50">
    <?php require_once 'Partials/GlobalSecureHeader.php'; ?>
    </header>
    <!-- END HEADER -->

    

    <!-- ASIDE (Hidden on mobile, visible on sm+) -->
    <aside class="hidden sm:flex fixed top-12 bottom-0 left-0 w-20 bg-gray-800 z-40 flex-col items-center select-none overflow-auto">
   <?php require_once 'Partials/GlobalSecureAside/GlobalSecureAside.php'; ?>
        
    </aside>
    <!-- END ASIDE -->

    <!-- MAIN CONTENT -->
    <!-- On mobile (<sm), flush left; on sm+ offset by 20 (sidebar width) -->
    <main class="
      fixed top-12 bottom-0 
      left-0 sm:left-20
      right-0 overflow-auto bg-gray-50 
    ">
        <?= $content; /* Server-side injected content */ ?>
    </main>

    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>