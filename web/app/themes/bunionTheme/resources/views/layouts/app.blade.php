@include('sections.header', [
    'classes' => 'position-fixed w-100 top-0 start-0 z-2',
    'showNavigation' => true,
])

@include('sections.header', [
    'classes' => 'invisible overflow-hidden w-100',
    'showNavigation' => false,
])
<main id="main" class="main">
    @yield('content')
</main>

@include('sections.footer')
