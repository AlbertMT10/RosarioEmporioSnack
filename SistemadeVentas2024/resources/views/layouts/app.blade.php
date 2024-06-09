<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @wireUiScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    </head>
    <body class="font-sans antialiased">
    <!-- https://tailwindcomponents.com/component/dashboard-template/landing -->
        <div>
            <x-dialog />
            <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
                <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
                @livewire('dashboard.sidebar')
                <div class="flex flex-col flex-1 overflow-hidden">
                    @livewire('dashboard.header')
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                        <div class="py-8 mx-auto">
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>
        </div>
        @stack('modals')
        @stack('js')
    </body>
</html>
