<div
    class="store-single-content d-flex align-items-center gap-md-6 gap-4 my-4 my-md-6 flex-column flex-lg-row {{ $block->classes }}">
    <div class="store-single-content-img-box d-flex flex-column gap-2">
        {!! get_the_post_thumbnail(null, 'surgeon-image', ['class' => 'object-fit-cover']) !!}
    </div>
    <?php ?>

    <div class="w-100">
        <h2 class="store-single-title text-primary mb-4 fw-semibold">{!! single_post_title() !!}</h2>
        <div class="store-single-description mb-4">
            <InnerBlocks />
        </div>

        <div class="store-single-buttons d-flex gap-2 flex-column flex-md-row">
            <button type="button" class="btn btn-primary store-single-button btnStoreSingle"
                data-title="{{ get_the_title() }}" data-bs-toggle="modal" data-bs-target="#iTouchModal">Get In
                Touch</button>
            @if ($surgeonPhone)
                <a href="tel:{{ $surgeonPhone }}"
                    class="btn btn-light border-dark-subtle store-single-button">{{ $surgeonPhone }}</a>
            @endif
            @if ($surgeonURL)
                <a href="{{ $surgeonURL }}" class="btn btn-light border-dark-subtle store-single-button">View
                    Website</a>
            @endif
        </div>
    </div>
</div>

<div class="modal fade " id="iTouchModal" tabindex="-1" aria-labelledby="iTouchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 px-4 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-img-box row align-items-center w-100 m-auto px-3">
                <div class="col-md-8 col-12">
                    <h1 class="modal-title text-primary fw-semibold fs-2 px-1 fw-semibold" id="iTouchModalLabel">Contact
                        Us
                    </h1>
                    <p class="modal-description ps-2 pt-0 mb-0  fw-light">{{ $formDescription }}</p>
                </div>
                <div class="col-4">
                    {{ $formIcon }}
                </div>
            </div>

            <div class="modal-body pt-0">
                @if (!$block->preview)
                    @php(advanced_form('form_get_in_touch'))
                @endif
            </div>
        </div>
    </div>
</div>
