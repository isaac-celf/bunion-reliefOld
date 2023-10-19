<?php
global $wp_query;

function my_render_post_content(int $id): void
{
    $GLOBALS['post'] = get_post($id);
    the_content();
    wp_reset_postdata();
}

?>

<div class="blog-box">
    <div class="blogs row gap-5" data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1 ?>"
        data-max="<?= $wp_query->max_num_pages ?>">
        @if ($blogs->have_posts())
            @while ($blogs->have_posts())
                @php $blogs->the_post() @endphp
                <x-card title="{!! get_the_title() !!}" description="{!! get_the_content() !!}"
                    image="{!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'img-fluid']) !!}" link="{!! get_permalink() !!}" />
            @endwhile
            @php wp_reset_query() @endphp
        @endif
    </div>

    <button data-total="" class="btn btn-primary loading load-more" id="load-more">
        <label>Load more</label>
        <span class="loader"></span>
    </button>
</div>
<InnerBlocks />
