<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tournaments</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[--backgroundcolor] bg-cover flex flex-col  min-h-screen">
<header class="bg-[--barcolor] text-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between shadow-lg">

      <!-- Logo  -->
      <a href="/" class="text-2xl font-bold text-white hover:text-gray-300">
        Tournaments
      </a>

      <!-- Knoppen -->
      <nav class="hidden md:flex space-x-6 ">
        <a href="/dashboard" class="text-xl font-bold text-white-300 hover:text-gray-700">Dashboard</a>
        <a href="/tournaments" class="text-xl font-bold text-white-300 hover:text-gray-700">Tournaments</a>
        <a href="/tournaments/create" class="text-xl font-bold text-white-300 hover:text-gray-700">Tournaments Aanmaken</a>

      </nav>
            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-200 bg-white dark:bg-red-600 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::check() ? Auth::user()->name : 'Gast' }}</div>
                            <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(Auth::check())
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profiel') }}
                            </x-dropdown-link>

                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('UitLoggen') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <x-dropdown-link :href="route('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('register')">
                                {{ __('Register') }}
                            </x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>
  </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>
    <footer class="bg-[--barcolor] text-gray-300 py-4 ">
          <div class="container mx-auto px-6 flex flex-col lg:flex-row lg:justify-between items-center">
            <p class="text-center text-sm lg:text-left">
              &copy; 2024 Tournaments.
            </p>
            <div class="flex space-x-4 mt-2 lg:mt-0">
              <a href="#" class="hover:text-white">Gebruiksvoorwaarden</a>
              <a href="#" class="hover:text-white">Contact</a>
            </div>
        </div>
      </footer>
</body>
</html>
