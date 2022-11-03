<script src="{{ asset('backend') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{ asset('backend') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('backend') }}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend') }}/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

    

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    <!-- Toastr Message Script-->
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    
        $(window).on("load", function(){
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
            
            @if(session()->get('error'))
                toastr.error('{{ session()->get('error') }}');
            @endif
            
            @if(session()->get('success'))
                toastr.success('{{ session()->get('success') }}');
            @endif
        });
    </script>

<script>
    $(document).ready(function(){
        $('.data_table').dataTable({
            "bProcessing": false,
            "sAutoWidth": false,
            "bDestroy":false,
            "bSort":true,
            "sPaginationType": "bootstrap", // full_numbers
            // "iDisplayStart ": 10,
            // "iDisplayLength": 10,
            "bPaginate": false, //hide/show pagination
            "bFilter": true, //hide/show Search bar
            "bInfo": false, // hide/show showing entries
        });

        $('.data_table--without-sort').dataTable({
            "bProcessing": false,
            "sAutoWidth": false,
            "bDestroy":false,
            "bSort":false,
            "sPaginationType": "bootstrap", // full_numbers
            // "iDisplayStart ": 10,
            // "iDisplayLength": 10,
            "bPaginate": false, //hide/show pagination
            "bFilter": true, //hide/show Search bar
            "bInfo": false, // hide/show showing entries
        });
    })
</script>



    @yield('js')

   