<div class="footer container">
    <div class="row align-items-center gap-5">
        <div class="footer__brands col-lg-2 mb-2 mb-lg-0 px-0 px-md-3 pt-4 pt-md-0">
            <img src="@asset('images/br-logo-white.png')" alt="bunion relief white logo" class="brand-img w-100 mb-2">
            <img src="@asset('images/br-mis-white.png')" alt="bunion relief mis logo" class="brand-img w-100">
        </div>

        @if ($footer)
            <div class="footer__content col p-0">
                <div class="footer__info row mb-3 ms-lg-6 gap-3 gap-lg-0">
                    @foreach ($footer as $item)
                        <div class="footer__list col-md">
                            <h4 class="text-capitalize text-white fs-5">{{ $item->label }}</h4>

                            @foreach ($item->children as $child)
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a href="{{ $child->url }}"
                                            class="nav-link text-capitalize text-white fw-light ps-0 py-0">{{ $child->label }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    @endforeach

                    {{-- contact us --}}
                    <div class="footer__list col siteOptions">
                        <h4 class="text-capitalize text-white fs-5">contact us</h4>
                        <ul class="nav flex-column">
                            <p class="text-white my-0 fw-light">{!! $address !!}</p>
                            <p class="text-white my-0 fw-light">{!! $phoneNum !!}</p>
                        </ul>
                        <ul class="nav gap-3">
                            <li class="nav-link p-0"><a href="{{ $socialFB }}"
                                    class="icon icon-link icon-link-hover" target="_blank"
                                    style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-facebook text-white"></i></a></li>
                            <li class="nav-link p-0"><a href="{{ $socialIG }}" class="icon-link icon-link-hover"
                                    target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-instagram text-white"></i></a></li>
                            <li class="nav-link p-0"><a href="{{ $socialX }}" class="icon-link icon-link-hover"
                                    target="_blank" style="--bs-icon-link-transform:translate3d(0, -.125rem, 0)"><i
                                        class="bi bi-twitter text-white"></i></a></li>
                        </ul>
                    </div>
                </div>

                {{-- buttons --}}
                <div class="footer__buttons ms-lg-5 d-flex flex-column flex-md-row align-items-lg-center">
                    @if ($getRepeaterButtons)
                        @foreach ($getRepeaterButtons as $button)
                            <a href="{{ $button['footer_button_link'] }}"
                                class="btn footer__button bg-white text-capitalize me-0 me-md-2 mb-3 mb-lg-0 ms-md-0 fs-8">{!! $button['footer_button'] !!}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
