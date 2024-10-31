<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    @include('panel.layouts.shared/head-css')
</head>

<body>
    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
    <!--Page Content -->
          @yield('content')

    </div>
</body>
</html>
