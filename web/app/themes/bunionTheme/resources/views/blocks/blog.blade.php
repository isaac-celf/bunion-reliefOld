<div class="blog-box">
    <div class="blogs row">
        @if ($blogs->have_posts())
            @while ($blogs->have_posts())
                @php $blogs->the_post() @endphp
                <div class="blog flex-column col-md-4">
                    <a href="{{ get_the_permalink() }}">
                        {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'img-fluid']) !!}
                        <h4 class="mt-3">{!! get_the_title() !!}</h4>
                    </a>
                    <p>{!! get_the_excerpt() !!}</p>
                </div>
            @endwhile
            @php wp_reset_query() @endphp
        @endif
    </div>

    <button data-total="" class="btn btn-primary loading" id="load-more">
        <label>Load More Posts</label>
        <span class="loader"></span>
    </button>
</div>
