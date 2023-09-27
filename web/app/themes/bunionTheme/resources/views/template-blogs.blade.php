{{--
  Template Name: News Template
--}}

@extend ('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())

        <div class="offset-content">
            <div class="news-column-grid">
                <div></div>
                <div>
                    @include('partials.blogs-page')
                </div>
                <div></div>
            </div>
        </div>
    @endwhile
@endsection
