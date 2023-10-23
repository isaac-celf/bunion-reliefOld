@if ($navigation)
    <nav class="navbar navbar-expand-lg navigation p-0">
        <div class="collapse navbar-collapse justify-content-end align-items-center first-navbar p-0 d-none d-lg-block"
            id="navbarNavDropdown">
            <ul class="my-menu navigation__list navbar-nav gap-2 me-1 align-items-center">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <li class="my-menu-item nav-item dropdown">
                            <a href="{{ $item->url }}"
                                class="nav-link btn {{ $item->classes ?? '' }} {{ $item->active ? '' : '' }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                {{ $item->label }}
                            </a>
                            <ul class="my-child-menu nav-item dropdown-menu rounded-0 bg-primary px-4 py-3"
                                aria-labelledby="dropdownMenuButton">
                                @foreach ($item->children as $child)
                                    <li class="my-child-item {{ $child->active ? '' : '' }}">
                                        <a href="{{ $child->url }}"
                                            class="dropdown-item nav-link my-child-menu-link fw-normal lh-1 text-white">
                                            {{ $child->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="my-menu-item nav-item ">
                            <a href="{{ $item->url }}"
                                class="nav-link btn {{ $item->classes ?? '' }} {{ $item->active ? '' : '' }}">
                                {{ $item->label }}
                            </a>
                        </li>
                    @endif
                @endforeach
                @if ($productPage)
                    <li class="my-menu-item nav-item">
                        <a href="{{ get_field('provider_button_link', 'option') }}"
                            class="nav-link btn keyBtn">{{ get_field('provider_button', 'option') }}
                        </a>
                    </li>
                @endif
                @if ($currentPage == $healthPage)
                    <li class="my-menu-item nav-item">
                        <a href="{{ get_field('provider_button_link', 'option') }}"
                            class="nav-link btn keyBtn keyBtn key-button-active">{{ get_field('provider_button', 'option') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <span class="navbar__menu-icon position-absolute top-50 end-0 translate-middle-y d-lg-none">
            <a href="#offcanvas" data-bs-toggle="offcanvas" role="button" aria-controls="sidebar">
                <i class="bi bi-list"></i>
            </a>
        </span>
    </nav>

    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="offcanvas" style="height: 100vh">
        <div class="offcanvas-header">
            <a class="brand" href="{{ home_url('/') }}">
                <img src="{{ bloginfo('url') . '/app/uploads/2023/09/Purple@300x.png' }}" alt="logo1"
                    class="mobile-offcanvas">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            <div class="offcanvas__navigation">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <a href="{{ $item->url }}"
                                        class="accordion-button collapsed text-decoration-none border-bottom"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#{{ $item->id }}"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ $item->label }}
                                    </a>
                                </h2>
                                @foreach ($item->children as $child)
                                    <div id="{{ $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a href="{{ $child->url }}" class="nav-link">{{ $child->label }}</a>
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
                                        class="accordion__single text-decoration-none py-3 px-4 d-block border-bottom">{{ $item->label }}</a>
                                </h2>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <a href="{{ get_field('provider_button_link', 'option') }}"
                                class="accordion__single text-decoration-none py-3 px-4 d-block border-bottom">{{ get_field('provider_button', 'option') }}</a>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="offcanvas__footer text-primary px-4">
                <ul class="d-flex flex-column mb-1 ps-0">
                    <div class="offcanvas__contact-details d-flex gap-2 align-items-center fs-3">
                        <i class="bi bi-telephone"></i>
                        <p class="my-0 fw-bold">{!! $phoneNum !!}</p>
                    </div>
                    <div class="offcanvas__contact-details d-flex gap-2 align-items-center fs-3">
                        <i class="bi bi-envelope"></i>
                        <p class="my-0 fw-bold">{!! $email !!}</p>
                    </div>
                </ul>
                <ul class="offcanvas__social-icons list-unstyled d-flex gap-3 mb-0">
                    <li class="p-1 ps-0 fs-3"><a href="{{ $socialFB }}" class="icon icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-facebook"></i></a></li>
                    <li class="p-1 ps-0 fs-3"><a href="{{ $socialIG }}" class="icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-instagram"></i></a></li>
                    <li class="p-1 ps-0 fs-3"><a href="{{ $socialX }}" class="icon-link icon-link-hover"
                            target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                class="bi bi-twitter-x"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endif
