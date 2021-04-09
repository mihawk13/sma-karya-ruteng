<!-- JavaScript -->

<!-- jQuery -->
<script src="{{ asset('assets/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/dataTables-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('assets/dist/js/jquery.slimscroll.js') }}"></script>

<!-- Owl JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Switchery JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('assets/dist/js/dropdown-bootstrap-extended.js') }}"></script>

@yield('script')

<!-- Init JavaScript -->
<script src="{{ asset('assets/dist/js/init.js') }}"></script>

@yield('script-bottom')

<script>
    $(document).ready(function() {
        $('.alert').delay(5000).fadeOut(350);
    } );
</script>
