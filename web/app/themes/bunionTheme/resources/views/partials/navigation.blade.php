@if ($navigation)
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container-fluid collapse navbar-collapse justify-content-end align-items-center first-navbar p-0"
            id="navbarNavDropdown">
            <ul class="my-menu navigation__list navbar-nav gap-2">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <li class="my-menu-item nav-item dropdown navigation__item ">
                            <a href="{{ $item->url }}"
                                class="nav-link dropdown-toggle btn navigation__link px-3 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : 'cta' }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $item->label }}
                            </a>

                            <ul class="my-child-menu nav-item dropdown-menu">
                                @foreach ($item->children as $child)
                                    <li class="my-child-item ">
                                        <a href="{{ $child->url }}" class="dropdown-item nav-link navigation__link">
                                            {{ $child->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        <li class="my-menu-item nav-item navigation__item ">
                            <a href="{{ $item->url }}"
                                class="nav-link btn navigation__link px-3 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : 'cta' }}">
                                {{ $item->label }}
                            </a>
                    @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <span class="position-absolute top-50 end-0 translate-middle-y">
            <i class="bi bi-list"></i>
        </span>
    </nav>
@endif
