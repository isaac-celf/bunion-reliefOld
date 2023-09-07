<header class="position-fixed top-0 start-50 translate-middle-x z-3">
    <div class="surgeon alignfull my-0">
        <div class="surgeon__container text-end container">
            <a href="#"
                class="nav-link w-100 container py-2 surgeon__link text-capitalize">{{ get_field('surgeon_button', 'option') }}</a>
        </div>
    </div>
    <div class="alignfull m-0">
        <div class="banner bg-white w-100 p-0 py-lg-2 main-navbar shadow">
            <div class="container px-0">
                <div class="row gap-3 p-3 p-lg-0 container m-0" style="place-items: center">
                    <a class="brand text-decoration-none col-2 fs-1 fw-semibold lh-1" href="{{ home_url('/') }}">
                        Bunion Relief
                    </a>
                    <div class="col p-0">
                        @include('partials.navigation')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
