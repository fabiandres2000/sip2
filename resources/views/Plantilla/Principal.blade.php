<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
    <!--begin::Base Path (base relative path for assets of this page) -->
    {{-- <base href="../"> --}}

    <!--end::Base Path -->
    <meta charset="utf-8" />
    {{-- <meta content-type="aplication/octet-stream" />
    <meta content-disposition="attachment; filename=kpi.pdf" /> --}}
    <title>SIP</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts -->

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
    </script>
    @include('Plantilla.Head')
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="
        kt-quick-panel--right 
        kt-demo-panel--right 
        kt-offcanvas-panel--right 
        kt-header--fixed 
        kt-header-mobile--fixed 
        kt-subheader--fixed 
        kt-subheader--enabled 
        kt-subheader--transparent
        kt-aside--enabled 
        kt-aside--fixed
        kt-aside--minimize 
        kt-page--loading ">

        <div id="app" >

        </div>
        @include('Plantilla.Footer')
        <script src="{{asset('js/app.js')}}"></script>


    </body>
    <!-- end::Body -->

</html>