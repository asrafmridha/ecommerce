
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/extensions/wNumb.min.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/extensions/nouislider.min.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('frontend') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('frontend') }}/app-assets/js/scripts/pages/app-ecommerce.js"></script>
    <!-- END: Page JS-->
    {{-- my js  --}}
    <script src="{{ asset('frontend') }}/myjs/product.js"></script>
    <script src="{{ asset('frontend') }}/app-assets/js/core/product.js"></script>


    {{-- checkout page js --}}
    
 
     <!-- BEGIN: Page Vendor JS-->
     
    
     <script src="{{ asset('frontend') }}/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
     
     <!-- END: Page Vendor JS-->
 
     <!-- BEGIN: Theme JS-->
     
    
     <!-- END: Theme JS-->
 
     <!-- BEGIN: Page JS-->
     <script src="{{ asset('frontend') }}/app-assets/js/scripts/pages/app-ecommerce-checkout.js"></script>
     <!-- END: Page JS-->

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
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>