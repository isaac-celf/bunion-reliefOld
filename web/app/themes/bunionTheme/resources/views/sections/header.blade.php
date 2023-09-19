<header class="{{ $classes }} box-shadow">
    <div class="surgeon alignfull my-0 bg-primary">
        <div class="surgeon__container text-end container">
            <a href="#" class="nav-link w-100 container py-2 surgeon__link text-capitalize text-dark"
                style="font-size: 10px">{{ get_field('surgeon_button', 'option') }}</a>
        </div>
    </div>
    <div class="alignfull m-0">
        <div class="banner bg-white w-100 p-0 py-lg-2">
            <div class="container px-0">
                <div class="row gap-3 p-3 p-lg-0 container m-0" style="place-items: center">
                    <a class="brand col-2 p-0" href="{{ home_url('/') }}">
                        <img src="http://bunion-relief.test/app/uploads/2023/09/Purple@300x.png" alt="logo1"
                            class="w-100">
                    </a>
                    <div class="col p-0">
                        @include('partials.navigation')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
