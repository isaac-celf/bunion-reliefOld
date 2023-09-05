<div class="surgeon p-0 m-0">
    <div class="surgeon__container text-end container">
        <a href="#"
            class="nav-link w-100 container py-2 pe-1 surgeon__link text-capitalize">{{ get_field('surgeon_button', 'option') }}</a>
    </div>
</div>
<header class="banner bg-white w-100 p-0 py-lg-4 main-navbar container">
    <div class="row gap-3 p-3 p-lg-0 container m-0" style="place-items: center">
        <a class="brand text-decoration-none col-2 fs-1 fw-semibold lh-1 ps-0" href="{{ home_url('/') }}">
            Bunion Relief
        </a>
        <div class="col p-0">
            @include('partials.navigation')
        </div>
    </div>
</header>
