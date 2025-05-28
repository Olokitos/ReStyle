<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Enable dark mode class strategy in Tailwind
      tailwind.config = {
        darkMode: 'class',
      }
    </script>
</head>
<body class="bg-[#FAFAFA] text-[#1b1b18] dark:bg-[#1b1b18] dark:text-[#FAFAFA] min-h-screen flex flex-col transition-colors duration-300">

    <!-- HEADER -->
    <header class="w-full z-50 bg-white dark:bg-[#121212] shadow transition-colors duration-300">
        <nav class="max-w-7xl mx-auto flex justify-between items-center px-4 lg:px-8 py-4">
            <!-- Left side: Logo and Brand -->
            <div class="flex items-center space-x-6">
                <a href="#">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Logo" class="h-8 w-auto">
                </a>
                <div class="flex flex-col">
                    <span class="text-2xl font-bold text-gray-900 dark:text-gray-100">ReStyle</span>
                </div>
            </div>

            <!-- Right side: Auth Links + Dark Mode Toggle -->
            <div class="flex items-center space-x-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-500 rounded-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-900 dark:text-gray-100 hover:border-gray-300 dark:hover:border-gray-600 border border-transparent rounded-sm">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-gray-900 dark:text-gray-100 hover:border-gray-300 dark:hover:border-gray-600 border border-transparent rounded-sm">Register</a>
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-900 dark:text-gray-100 hover:border-gray-300 dark:hover:border-gray-600 border border-transparent rounded-sm">Sell now</a>
                        @endif
                    @endauth
                @endif

                <!-- Dark Mode Toggle Button -->
                <button id="darkModeToggle" aria-label="Toggle Dark Mode" class="ml-4 p-2 rounded border border-gray-300 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    🌙
                </button>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow flex flex-col items-center justify-center text-center px-4 transition-colors duration-300">
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-6xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Waste Less, Wear More!</h1>
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 mb-10">
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                Elit sunt amet fugiat veniam occaecat.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none">Get started</a>
                <a href="#" class="text-sm font-semibold text-gray-900 dark:text-gray-100 hover:underline">Learn more →</a>
            </div>
        </div>
    </main>

    <script>
      const toggleButton = document.getElementById('darkModeToggle');
      const htmlElement = document.documentElement;

      // Load saved preference from localStorage
      if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        htmlElement.classList.add('dark');
      }

      toggleButton.addEventListener('click', () => {
        htmlElement.classList.toggle('dark');
        if (htmlElement.classList.contains('dark')) {
          localStorage.setItem('theme', 'dark');
        } else {
          localStorage.setItem('theme', 'light');
        }
      });
    </script>

</body>
</html>
