<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    @livewireStyles()
    <!-- CSS Assets -->

    <link rel="stylesheet" href="{{ asset('app.css') }}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Javascript Assets -->



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">





    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>

        <!-- Main Sidebar Container -->
        @include('admin.includes.sidebar2',['name' => isset($name) ? $name : "Gamal"])
        <!--  End Main Sidebar Container -->

        @include('admin.includes.nav_barup')
        @include('admin.includes.content')

        <!-- Navbar -->

        <!-- /.navbar -->
        <!-- Main Content Wrapper -->






        <!-- Main Footer -->
        @include('admin.includes.footer')
    </div>
    <div id="x-teleport-target"></div>



    @livewireScripts()
    <script src="{{ asset('app.js') }}" defer></script>
    @yield('script')

</body>

</html>
