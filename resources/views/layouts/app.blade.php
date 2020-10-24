<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        
        @include('layouts.seo')
        @include('sweetalert::alert')

        <title>{{ config('app.name', 'Innova Invest') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/d1697f2fa9.js" crossorigin="anonymous"></script>
    </head>
    <body  class="font-sans bg-black text-white antialiased">
        <div class="min-h-screen bg-black">
            <div class="w-screen">
                @livewire('navigation-dropdown')
            </div>
            
            <!-- Page Heading -->
            <header class="bg-black border-b border-gray-900 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <div class="xl:flex justify-center container md:flex">
                @can('isAdmin')
                    <aside class="w-2/6">
                        @include('layouts.sidebar')
                    </aside>
                @endcan
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>  
            @include('layouts.footer') 
        </div>

        @stack('modals')
        

        @livewireScripts
    </body>
</html>
