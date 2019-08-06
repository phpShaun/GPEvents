@include('includes.head')
<body>
    <div id="app">
        @include('includes.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
