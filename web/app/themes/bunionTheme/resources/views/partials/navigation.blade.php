@if ($navigation)
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container-fluid collapse navbar-collapse justify-content-end align-items-center first-navbar p-0 d-none d-lg-block"
            id="navbarNavDropdown">
            <ul class="my-menu navigation__list navbar-nav gap-2 me-1">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <li class="my-menu-item nav-item dropdown navigation__item ">
                            <a href="{{ $item->url }}"
                                class="nav-link  nav-link-dot btn {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $item->label }}
                            </a>

                            {{-- TODO --}}
                            {{-- <button type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-1-circle"></i>
                            </button> --}}


                            <ul class="my-child-menu nav-item dropdown-menu rounded-0 bg-primary p-3"
                                aria-labelledby="dropdownMenuButton">
                                @foreach ($item->children as $child)
                                    <li class="my-child-item">
                                        <a href="{{ $child->url }}"
                                            class="dropdown-item nav-link my-child-menu-link fw-normal lh-1 text-white">
                                            {{ $child->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        <li class="my-menu-item nav-item navigation__item ">
                            @if ($item->id == 37)
                                <a href="{{ $item->url }}"
                                    class="nav-link btn {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                    {{ $item->label }}
                                </a>
                            @else
                                <a href="{{ $item->url }}"
                                    class="nav-link btn {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                    {{ $item->label }}
                                </a>
                            @endif
                    @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <span class="navbar__menu-icon position-absolute top-50 end-0 translate-middle-y d-lg-none">
            <a href="#offcanvas" data-bs-toggle="offcanvas" role="button" aria-controls="sidebar">
                <i class="bi bi-list"></i>
            </a>
        </span>
    </nav>

    {{-- offcanvas --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" style="height: 100vh">
        <div class="offcanvas-header">
            <a class="brand col-1" href="{{ home_url('/') }}">
                <img src="http://bunion-relief.test/app/uploads/2023/09/Purple@300x.png" alt="logo1"
                    class="mobile-offcanvas">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between pt-0">
            <div class="offcanvas__navigation">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <a href="{{ $item->url }}"
                                        class="accordion-button collapsed px-0 text-decoration-none border-bottom"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#{{ $item->id }}"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ $item->label }}
                                    </a>
                                </h2>
                                @foreach ($item->children as $child)
                                    <div id="{{ $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a href="{{ $item->url }}" class="nav-link">{{ $child->label }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <a href="{{ $item->url }}"
                                        class="accordion__single text-decoration-none py-3 d-block border-bottom">{{ $item->label }}</a>
                                </h2>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="offcanvas__footer text-primary">
                <ul class="d-flex flex-column mb-1 ps-0">
                    <div class="offcanvas__contact_details d-flex gap-2 align-items-center">
                        <i class="bi bi-telephone"></i>
                        <p class="my-0 fw-bold">{!! $phoneNum !!}</p>
                    </div>
                    <div class="offcanvas__contact_details d-flex gap-2 align-items-center">
                        <i class="bi bi-envelope"></i>
                        <p class="my-0 fw-bold">{!! $email !!}</p>
                    </div>
                </ul>
                <ul class="list-unstyled d-flex gap-2 mb-0">
                    <li class="p-1 ps-0"><a href="{{ $socialFB }}" class="icon icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-facebook"></i></a></li>
                    <li class="p-1 ps-0"><a href="{{ $socialIG }}" class="icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-instagram"></i></a></li>
                    <li class="p-1 ps-0"><a href="{{ $socialX }}" class="icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endif
