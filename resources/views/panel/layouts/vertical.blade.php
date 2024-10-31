<!DOCTYPE html>
<html lang="en" data-sidenav-view="{{ $sidenav ?? 'default' }}">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @include('panel.layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('panel.layouts.shared/head-css')
</head>

<body>

    <div class="flex wrapper" style="direction: rtl!important;">

        @include('panel.layouts.shared.sidebar')

        <div class="page-content">

            @include('panel.layouts.shared/topbar')

            <main class="flex-grow p-6">

                @include('panel.layouts.shared/page-title', [
                    'title' => $title,
                    'sub_title' => $sub_title,
                ])

                @yield('content')

            </main>

            @include('panel.layouts.shared/footer')

        </div>

    </div>

    @include('panel.layouts.shared/customizer')

    @include('panel.layouts.shared/footer-scripts')

    @vite(['resources/js/app.js'])

    <script>
        @if(Session::has('success'))
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left", // Position the toast on the top left
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000", // Duration the toast will be displayed
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn", // Fade in animation
            "hideMethod": "fadeOut" // Fade out animation
        };
        toastr.success("{{ Session::get('success') }}");
        @endif

            @if(Session::has('error'))
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left", // Position the toast on the top left
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000", // Duration the toast will be displayed
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn", // Fade in animation
            "hideMethod": "fadeOut" // Fade out animation
        };
        toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</body>


</html>
