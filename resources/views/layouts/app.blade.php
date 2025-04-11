@include('shared.head')

<body>

    <script src="assets/dist/js/demo-theme.min.js?1692870487"></script>
    @include('shared.script')
    <div class="page">
        <!-- Sidebar -->
        @include('shared.sidebar')
        <!-- Navbar -->
        @include('shared.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('content')
            @include('shared.footer')
        </div>
    </div>
    <!-- Libs JS -->

    @yield('script')
</body>

</html>
