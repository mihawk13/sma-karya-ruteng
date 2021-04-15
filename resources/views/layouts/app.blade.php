<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    @livewireStyles
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-green">

        <!-- Top Menu Items -->
        @include('layouts.topbar')
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        @include('layouts.sidebar')
        <!-- /Left Sidebar Menu -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- Title -->
                <div class="row heading-bg">
                    <!-- Breadcrumb -->
                    @yield('breadcrumb')
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->

                <!-- Content -->
                @yield('content')
                <!-- /Content -->

            </div>
            <!-- Footer -->
            @include('layouts.footer')
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    @include('layouts.scripts')

    @livewireScripts
    @stack('scripts')
</body>

</html>
