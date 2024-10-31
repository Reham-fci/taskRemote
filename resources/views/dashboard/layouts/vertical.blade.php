<!DOCTYPE html>
<html lang="en" data-sidenav-view="{{ $sidenav ?? 'default' }}">

<head>
    @include('dashboard.layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('dashboard.layouts.shared/head-css')
</head>

<body>

    <div class="flex wrapper" style="direction: rtl!important;">

        @include('dashboard.layouts.shared.sidebar')

        <div class="page-content">

            @include('dashboard.layouts.shared/topbar')

            <main class="flex-grow p-6">

                @include('dashboard.layouts.shared/page-title', [
                    'title' => $title,
                    'sub_title' => $sub_title,
                ])

                @yield('content')

            </main>

            @include('dashboard.layouts.shared/footer')

        </div>

    </div>

    @include('dashboard.layouts.shared/customizer')

    @include('dashboard.layouts.shared/footer-scripts')

    @vite(['resources/js/app.js'])

</body>


</html>
