<?php
// get_post('faq');
// dd(get_post_type('faq'));
?>

{{-- @include('blocks.question'); --}}

<div class="e-content">
    @php(the_content())
</div>

{{-- <div class="store-single-content d-flex align-items-center gap-3 mb-4">
    <div class="store-single-content-imgbox d-flex flex-column gap-2">
        <?php // echo get_the_post_thumbnail(null, 'medium');
        ?>

    </div>


    <div>
        <h2 class="store-single-title text-primary mb-4 fw-semibold"><?php // single_post_title();
        ?></h2>
        <div class="store-single-content mb-4">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis iure accusamus numquam perspiciatis
                ipsa
                quas fugit itaque animi totam dolorum. Reiciendis animi cum soluta error culpa sit debitis illo eius!
            </p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis iure accusamus numquam perspiciatis
                ipsa
                quas fugit itaque animi totam dolorum. Reiciendis animi cum soluta error culpa sit debitis illo eius!
            </p>
            <a href="#">Read More</a>
        </div>

        <div class="store-single-buttons d-flex gap-2">
            <button type="button" class="btn btn-primary store-single-buttons btnTouch" data-bs-toggle="modal"
                data-bs-target="#iTouchModal">Get In Touch</button>
            <a href="tel"
                class="btn btn-light border-dark-subtle store-single-buttons">{{ get_post_meta($post->ID, 'wpsl_phone', true) }}</a>
            <a href="#" class="btn btn-light border-dark-subtle store-single-buttons">View Website</a>
        </div>
    </div>
</div>

<div class="modal fade" id="iTouchModal" tabindex="-1" aria-labelledby="iTouchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="iTouchModalLabel">Contact Us</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div>
    <?php // echo do_shortcode('[wpsl_map]');
    ?>
</div>

<div>

</div>
TODO > Pull FAQ Post_type --}}
