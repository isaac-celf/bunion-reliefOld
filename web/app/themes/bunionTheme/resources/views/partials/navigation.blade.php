@if ($navigation)
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container-fluid collapse navbar-collapse justify-content-end align-items-center first-navbar"
            id="navbarNavDropdown">
            <ul class="my-menu navigation__list nav">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <li class="my-menu-item nav-item dropdown navigation__item">
                            <a href="{{ $item->url }}" class="nav-link dropdown-toggle btn navigation__link px-3"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $item->label }}
                            </a>

                            <ul class="my-child-menu dropdown-menu">
                                @foreach ($item->children as $child)
                                    <li class="my-child-item ">
                                        <a href="{{ $child->url }}" class="dropdown-item">
                                            {{ $child->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        <li class="my-menu-item navigation__item">
                            <a href="{{ $item->url }}" class="nav-link btn navigation__link px-2">
                                {{ $item->label }}
                            </a>
                    @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
@endif
