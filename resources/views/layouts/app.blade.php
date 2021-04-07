<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
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

				<!-- Footer -->
                @include('layouts.footer')
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    @include('layouts.scripts')


</body>

</html>
