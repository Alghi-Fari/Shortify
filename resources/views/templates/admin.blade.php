<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - {{ $title ?? '' }}</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/style.css') }}" />
    @stack('css')


    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}


    @include('components.header')

    <div class="container mt-3">

        @yield('content')
    </div>


    <!-- js -->
    <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>


    <!-- buttons for Export datatable -->
    <script src="{{ asset('assets/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/vfs_fonts.js') }}"></script>

    <!-- Datatable Setting js -->
    <script src="{{ asset('assets/vendors/scripts/datatable-setting.js') }}"></script>

    {{-- Jquery Validator --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- add sweet alert js & css in footer-->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweet-alert.init.js') }}"></script>


    {{-- Google --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>

    <script>
        @if ($message = Session::get('success'))
            swal({
                text: '{{ $message }}',
                type: 'success',
            })
        @endif

        @if ($message = Session::get('errors'))
            swal({
                text: "{{ $message }}",
                type: 'error',
            })
        @endif
    </script>

    <script src="{{ asset('assets/scripts/script.js') }}"></script>

    @stack('js')
</body>

</html>
