<div class="{{ $block->classes }}">
    @if ($questions)
        <div class="question container p-0">
            @foreach ($questions as $item)
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h3 class="accordion-button question__info collapsed px-0 text-decoration-none border-bottom bg-white fw-semibold"
                            type="button" data-bs-toggle="collapse" data-bs-target="#{{ $item->ID }}"
                            aria-expanded="false" aria-controls="flush-collapseOne">
                            {{ $item->post_title }}
                        </h3>
                        <div id="{{ $item->ID }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body py-0 ps-0">
                                <span class="question__answer fw-light">{!! $item->post_content !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div>
        <InnerBlocks />
    </div>
</div>
