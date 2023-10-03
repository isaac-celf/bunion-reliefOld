<header class="{{ $classes }} box-shadow">
    <div class="alignfull m-0">
        <div class="banner bg-white w-100 p-0 py-lg-3">
            <div class="container pe-lg-0">
                <div class="row gap-3  px-0 p-3 p-lg-0 container m-0 align-items-center">
                    <a class="brand col-2 p-0" href="{{ home_url('/') }}">
                        <img src="@asset('images/br-logo-purple.png')" alt="bunion relief logo" class="w-100">
                    </a>
                    <div class="col p-0">
                        @include('partials.navigation')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
