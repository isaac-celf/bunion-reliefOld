<header class="{{ $classes }} box-shadow">
    <div class="alignfull m-0">
        <div class="banner bg-white w-100 p-0 py-3 shadow">
            <div class="px-0">
                <div class="row nav-max-width align-items-center justify-content-between m-auto px-3">
                    <a class="brand col-md-2 col-4 p-0" href="{{ home_url('/') }}">
                        <img src="@asset('images/br-logo-purple.png')" alt="bunion relief logo" class="w-100">
                    </a>
                    <div class="col p-0">
                        @if ($showNavigation)
                            @include('partials.navigation')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
