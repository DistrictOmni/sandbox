<div class="flex flex-col" style="height: calc(100vh - 3rem);">
    <!-- VIEW SUBHEADER (fixed, doesn't scroll) -->
    <div class="bg-red-100 p-4 h-20 flex items-center justify-between">
    <?php
$headerPath = __DIR__ . '/../Modules/People/Students/Views/StudentProfile/StudentProfileHeader/StudentProfileHeader.php';
if (file_exists($headerPath)) {
    require_once $headerPath;
} else {
    echo 'File not found: ' . $headerPath;
}
?>

    </div>
    <!-- END VIEW SUBHEADER -->

    <div class="flex flex-1 overflow-hidden">
       <!-- LEFT ASIDE (fixed, no scroll, full height minus subheader) -->
        <aside class="w-64 bg-white border-r" style="height: calc(100vh - 3rem); overflow-y-auto;">
            <?php require_once __DIR__ . '/../Modules/People/Students/Views/StudentProfile/StudentProfileAside/StudentProfileAside.php'; ?>
        </aside>

        <!-- END LEFT ASIDE -->

        <!-- RIGHT SIDE: subheader + main content (scroll only on content) -->
        <div class="flex-1 flex flex-col">
            <!-- MAIN CONTENT AREA: this is where scrolling occurs if necessary -->
            <div class="flex-1 overflow-auto p-4 flex">
                <!-- MAIN CONTENT AREA ONLY SCROLLS -->
                <div class="flex-1 overflow-auto">
                    <!-- Inject the specific student profile views here -->
                    <?php
                        // Include the student profile content dynamically based on the current view
                        if (isset($studentView)) {
                            include($studentView); // Render specific student profile content here
                        }
                    ?>
                </div>
            </div>
            <!-- END MAIN CONTENT AREA -->
        </div>
    </div>
</div>
