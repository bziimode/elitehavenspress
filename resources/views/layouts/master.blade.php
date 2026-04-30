<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    {{-- Summernote css links --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">

    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
 
</head>
<body>

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">

         @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">

            <main>

                @yield('content')

            </main>

            @include('layouts.inc.admin-footer')

        </div>
    </div>



    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" ></script>

    {{-- Summernote JS link --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="//cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
    
    <script src="{{asset('assets/js/scripts.js')}}" ></script>
    <script src="{{ asset('assets/js/custom-admin.js')}}"></script>

</body>
</html>
