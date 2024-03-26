        <!-- Vendor js -->
        <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>
        <!-- Input Mask js -->
        <script src="{{ asset('admin-assets/vendor/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
        <!-- Daterangepicker js -->
        <script src="{{ asset('admin-assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Vector Map js -->
        <script src="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
        </script>
        <script
            src="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
        </script>
        <!-- App js -->
        <script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
        <!-- Quill Editor js -->
        <script src="{{ asset('admin-assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/quill-editor.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        @if (Session::has('login_error'))
            <script>
                console.log('login_error')
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{__('main.login_error_message')}}",
                })
            </script>
        @endif
    </body>
</html>