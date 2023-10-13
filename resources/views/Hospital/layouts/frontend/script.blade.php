<script src="{{ asset('js/app.js') }}"></script>

<!-- latest jquery-->
<script src="{{ asset('Dashboard/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('Dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/main-js/popper.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/main-js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/main-js/index.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('Dashboard/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('Dashboard/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('Dashboard/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('Dashboard/assets/js/sidebar-menu.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- Plugins JS Ends-->
<!-- first chart -->

<!-- Theme js-->
<script src="{{ asset('Dashboard/assets/js/script.js') }}"></script>
<!-- login js-->
<script src="{{asset('Dashboard/assets/noty/noty.min.js')}}"></script>


<!-- Plugin used-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

@yield('script')
