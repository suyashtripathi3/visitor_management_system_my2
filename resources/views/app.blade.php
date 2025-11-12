<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>Visitor Management</title>

    {{-- Theme CSS --}}
    <link href="{{asset('assets/backend/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @routes
    @inertiaHead
</head>

<body data-nav-headerbg="color_2" data-sidebarbg="color_2">

    @inertia

    {{-- jQuery + Vendor JS --}}
    <script src="{{asset('assets/backend/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/metismenu/dist/metisMenu.min.js')}}"></script>

    {{-- ApexCharts --}}
    <script src="{{asset('assets/backend/vendor/apexcharts/dist/apexcharts.min.js')}}"></script>

    {{-- DateTime Picker --}}
    <script src="{{asset('assets/backend/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    {{-- Swiper --}}
    <script src="{{asset('assets/backend/vendor/swiper/js/swiper-bundle.min.js')}}"></script>

    {{-- Draggable --}}
    <script src="{{asset('assets/backend/vendor/draggable/draggable.js')}}"></script>

    {{-- Datatables --}}
    <script src="{{asset('assets/backend/vendor/datatables/js/jquery.dataTables.bundle.min.js')}}"></script>

    {{-- Language --}}
    <script src="{{asset('assets/backend/vendor/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/backend/js/translator.js')}}"></script>

    {{-- Theme core --}}
    <script src="{{asset('assets/backend/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{asset('assets/backend/js/deznav-init.js')}}"></script>
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
    <script src="{{ asset('assets/backend/js/newcustom.js') }}"></script>

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script>
document.addEventListener('DOMContentLoaded', function () {

    window.addEventListener('toast', function (event) {
        const data = event.detail[0] || {};
        const type = data.type || 'info';
        const message = data.message || '';

        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "4000",
        };

        // Debug alert (for testing)
        // REMOVE after confirming
  

        switch (type) {
            case 'success':
                toastr.success(message);
                break;
            case 'error':
                toastr.error(message);
                break;
            case 'warning':
                toastr.warning(message);
                break;
            default:
                toastr.info(message);
                break;
        }
    });
});
</script>
    {{-- ✅ Load Vue after theme scripts so theme DOM stays intact --}}
    @vite('resources/js/app.js')

</body>
</html>
