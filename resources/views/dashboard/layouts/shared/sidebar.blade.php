<div class="app-menu">

    <!-- Sidenav Brand Logo -->
    <a href="{{ route('panel.index') }}" class="logo-box">
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="/images/logo-light.png" class="logo-lg h-6" alt="Light logo">
            <img src="/images/logo-sm.png" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="/images/logo-dark.png" class="logo-lg h-6" alt="Dark logo">
            <img src="/images/logo-sm.png" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="mgc_round_line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_home_3_line"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">file-manager</li>



            <li class="menu-item">
                <a href="{{route('admin.folder-manager')}}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_folder_2_line"></i></span>
                    <span class="menu-text"> File Manager </span>
                </a>
            </li>

            </li>

        </ul>

    </div>
</div>
<!-- Sidenav Menu End  -->
