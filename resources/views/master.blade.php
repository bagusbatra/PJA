@include('partials/header')
<body>
    @include('partials/panel')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('partials/header')

        {{-- konten --}}
        @yield('konten')
        {{-- akhir konten --}}
        
@include('partials/footer')