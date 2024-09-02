<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.6.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-800 text-white">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 p-4 relative sidebar">
        <div class="flex justify-between items-center mb-4"> <!-- Flex container for alignment -->
        <h2 class="text-xl font-bold">My Workspace</h2>
        <div class="profile-container">
            <img src="path/to/your/profile-pic.jpg" alt="Profile Picture" class="profile-pic">
        </div>
    </div>

            <!-- Search Field -->
            <div class="search-container">
            <svg class="search-icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11 2a9 9 0 1 0 6.63 15.39l5.36 5.36a1 1 0 0 0 1.41-1.41l-5.36-5.36A9 9 0 0 0 11 2zm0 2a7 7 0 1 1 0 14 7 7 0 0 1 0-14z"/>
            </svg>
            <input type="text" placeholder="Search" class="bg-gray-700 text-white rounded px-4 py-2 w-full">
            </div>
            <ul>
                <li>
                    <a href="#" class="block py-2 hover:bg-gray-700">Dashboard</a>
                </li>
                <li class="relative">
                    <button class="block py-2 w-full text-left hover:bg-gray-700 dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        <span class="flex items-center justify-between">
                            Analysis
                            <!-- Dropdown Icon on the right -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 ml-2" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z"/>
                            </svg>
                        </span>
                    </button>
                    <!-- Dropdown Menu positioned below -->
                    <ul class="dropdown-menu">
                        <li><a href="#" class="block py-2 hover:bg-gray-600">User Analysis</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Content Analysis</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Servey Report</a></li>
                    </ul>
                </li>

                <li class="relative">
                    <button class="block py-2 w-full text-left hover:bg-gray-700 dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        <span class="flex items-center justify-between">
                            Management
                            <!-- Dropdown Icon on the right -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 ml-2" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z"/>
                            </svg>
                        </span>
                    </button>
                    <!-- Dropdown Menu positioned below -->
                    <ul class="dropdown-menu">
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Content Upload</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Content Management</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Category & Tags</a></li>
                    </ul>
                </li>

                <li class="relative">
                    <button class="block py-2 w-full text-left hover:bg-gray-700 dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        <span class="flex items-center justify-between">
                            Affiliate
                            <!-- Dropdown Icon on the right -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 ml-2" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z"/>
                            </svg>
                        </span>
                    </button>
                    <!-- Dropdown Menu positioned below -->
                    <ul class="dropdown-menu">
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Analytics</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Campaign</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Affiliate</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">Sales & Commissions</a></li>
                        <li><a href="#" class="block py-2 hover:bg-gray-600">setting</a></li>
                    </ul>
                </li>
                <!-- These items will now be below the dropdown -->
                <li>
                    <a href="#" class="block py-2 hover:bg-gray-700">API Management</a>
                </li>
                <li>
                    <a href="#" class="block padding-invite hover:bg-gray-700">invite people</a>
                </li>
                <li>
                    <a href="#" class="block py-2 hover:bg-gray-700">Help & Support</a>
                </li>
                <li>
                    <a href="#" class="block padding-app-version hover:bg-gray-700">App version 3.1</a>
                </li>
            </ul>
        </aside>


        <!-- Main Content -->
        <div class="flex-grow">
            <nav class="bg-gray-800 p-4">
                <div class="container mx-auto">
                    <a href="#" class="text-xl font-bold ">
                      <span style="color: #6E79D6;">←</span>
                      <span style="color: #FFFFFF;font-size:12px;font-weight:600">Back</span>
                    </a>
                </div>
            </nav>

            <main class="container mx-auto p-4 flex-grow">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
     $(document).ready(function() {
    // Dropdown toggle functionality
    $('.dropdown-toggle').click(function() {
        // Toggle the current dropdown's visibility
        const dropdownMenu = $(this).next('.dropdown-menu');
        dropdownMenu.toggleClass('show');
        
        // Add or remove 'active' class based on the 'show' class presence
        if (dropdownMenu.hasClass('show')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
        
        // Optionally, remove 'active' class from other dropdowns
        $('.dropdown-toggle').not($(this)).removeClass('active');
        $('.dropdown-menu').not(dropdownMenu).removeClass('show');
    });
    
    // Hide dropdown when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown-toggle, .dropdown-menu').length) {
            $('.dropdown-menu').removeClass('show');
            $('.dropdown-toggle').removeClass('active');
        }
    });

    // Active menu item functionality
    $('ul li > a').click(function() {
        // Remove active class from all items
        $('ul li a').removeClass('active');
        // Add active class to the clicked item
        $(this).addClass('active');
        
        // Remove active class from dropdown buttons
        $('.dropdown-toggle').removeClass('active');
    });

    // Active dropdown item functionality
    $('.dropdown-menu li a').click(function(event) {
        event.stopPropagation(); // Prevent dropdown from closing immediately
        // Remove active class from all dropdown items
        $(this).closest('.dropdown-menu').find('a').removeClass('active');
        // Add active class to the clicked dropdown item
        $(this).addClass('active');

        // Set active class on the dropdown toggle button
        $(this).closest('.relative').find('.dropdown-toggle').addClass('active');

        // Close the dropdown after selection (optional)
        $(this).closest('.dropdown-menu').removeClass('show');
    });
});


</script>


    @yield('scripts')
</body>
</html>
