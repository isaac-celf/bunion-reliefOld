<div class="store-single-content d-md-flex align-items-center gap-3 mb-4 {{ $block->classes }}">
    <div class="store-single-content-imgbox d-flex flex-column gap-2">
        <?php echo get_the_post_thumbnail(null, 'medium');
        ?>

    </div>
    <?php ?>

    <div>
        <h2 class="store-single-title text-primary mb-4 fw-semibold"><?php single_post_title();
        ?></h2>
        <div class="store-single-content mb-4">
            <InnerBlocks />
        </div>

        <div class="store-single-buttons d-flex gap-2">
            <button type="button" class="btn btn-primary store-single-button btnStoreSingle"
                data-title="{{ get_the_title() }}" data-bs-toggle="modal" data-bs-target="#iTouchModal">Get In
                Touch</button>
            <a href="tel:{{ $surgeonPhone }}"
                class="btn btn-light border-dark-subtle store-single-button">{{ $surgeonPhone }}</a>
            <a href="{{ $surgeonURL }}" class="btn btn-light border-dark-subtle store-single-button">View Website</a>
        </div>
    </div>
</div>

<div class="modal fade " id="iTouchModal" tabindex="-1" aria-labelledby="iTouchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 px-4 pb-0">
                <h1 class="modal-title text-primary fw-semibold fs-2 px-1 fw-semibold" id="iTouchModalLabel">Contact Us
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex px-3 align-items-center pe-6">
                <p class="modal-description ps-3 pt-0 mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Recusandae,facilis. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                </p>
                <img src="http://bunion-relief.test/app/uploads/2023/09/icon.svg" alt="photo1"
                    style="height: 118px; width: 180px;">
            </div>

            <div class="modal-body pt-0">
                @php
                    if (!$block->preview):
                        advanced_form('613');
                    endif;
                @endphp
            </div>
        </div>
    </div>
</div>
