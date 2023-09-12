@include('sections.header', [
    'classes' => 'position-fixed w-100 top-0 start-50 translate-middle-x z-3',
    'showNavigation' => true,
])

@include('sections.header', [
    'classes' => 'invisible overflow-hidden w-100 pb-lg-4',
    'showNavigation' => false,
])
<main id="main" class="main">
    @yield('content')
</main>

@include('sections.footer')
