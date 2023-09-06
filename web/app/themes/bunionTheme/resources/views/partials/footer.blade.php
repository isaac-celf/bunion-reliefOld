<div class="footer container">
    <div class="row align-items-center">
        <div class="footer__brands col-lg-2">
            <p>bunion relief</p>
            <p>phantom</p>
            <p>paragon28</p>
        </div>

        @if ($footer)
            <div class="footer__content col">
                <div class="footer__info row mb-3 ms-lg-5 gap-3 gap-lg-0">
                    @foreach ($footer as $item)
                        <div class="footer__list col-md">
                            <h4 class="text-capitalize text-white">{{ $item->label }}</h4>

                            @foreach ($item->children as $child)
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a href="{{ $child->url }}"
                                            class="nav-link text-capitalize text-white fw-light ps-0 py-0">{{ $child->label }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="footer__list col siteOptions">
                        <h4 class="text-capitalize text-white">contact us</h4>
                        <ul class="nav flex-column">
                            <p class="text-white my-0 fw-light">{!! $address !!}</p>
                            <p class="text-white my-0 fw-light">{!! $phoneNum !!}</p>
                        </ul>
                        <ul class="nav gap-2">
                            <li class="nav-link p-1"><a href="{{ $socialFB }}"
                                    class="icon icon-link icon-link-hover" target="_blank"
                                    style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-facebook text-white"></i></a></li>
                            <li class="nav-link p-1"><a href="{{ $socialIG }}" class="icon-link icon-link-hover"
                                    target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-instagram text-white"></i></a></li>
                            <li class="nav-link p-1"><a href="{{ $socialX }}" class="icon-link icon-link-hover"
                                    target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-twitter text-white"></i></a></li>
                        </ul>
                    </div>
                </div>

                {{-- buttons --}}

                <div class="footer__buttons ms-lg-5 d-flex flex-column flex-md-row" style="margin-left: -10px">
                    @if ($getRepeaterButtons)
                        @foreach ($getRepeaterButtons as $button)
                            <a href="{{ $button['footer_button_link'] }}"
                                class="btn footer__button cta bg-white text-capitalize me-2 mb-3 mb-lg-0">{!! $button['footer_button'] !!}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
