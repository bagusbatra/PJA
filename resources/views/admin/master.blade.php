@include('admin/partials/head')
<body>
    @include('admin/partials/leftpanel')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('admin/partials/header')

        {{-- konten --}}
        @yield('kontenAdmin')
        {{-- akhir konten --}}
        
@include('admin/partials/footer')