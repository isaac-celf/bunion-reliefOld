{{-- <div class="stepper ">
    <div class="row justify-content-center align-items-center flex-column flex-md-row gap-5 gap-md-0 mb-5">
        <div class="stepper-img-box col-md-4 col-6">
            <img src="" alt="stepper image" class="stepper-img w-100">
        </div>
        <div class="step col-md-8 col-12">
            <div class="row">
                <div class="stepper-step -flex flex-column px-3 px-md-5">
                    <InnerBlocks allowedBlocks='{{ $allowedBlocks }}' template='{{ $template }}' />
                </div>
            </div>
        </div>

    </div>

</div> --}}

@if ($step)
    <div class="{{ $block->classes }}">
        <div class="stepper-container row align-items-center px-2">
            <div class="swiper stepperSlider col-4">
                <div class="stepper swiper-wrapper">
                    @foreach ($step as $index => $single)
                        <div class="stepper-img-box col-md-4 col-6 swiper-slide w-100" data-hash="{{ $index }}">
                            <img src="{{ $single['step_image']['sizes']['500-image'] }}" alt="stepper image"
                                class="stepper-img w-100">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-8 position-relative">

                <div class="row align-items-center">
                    <div class="swiper-pagination"></div>
                    <div class="step">
                        <div class="stepper-step ">
                            @foreach ($step as $index => $single)
                                <div class="stepper-single d-flex align-items-center gap-6 opacity-50"
                                    data-image="{{ $index }}">
                                    <div class="stepper-content w-100">
                                        <a href="#{{ $index }}" class="text-decoration-none">
                                            <h3 class="stepper-title">{{ $single['step_title'] }}</h3>
                                            <p class="stepper-description text-black">{{ $single['step_description'] }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
