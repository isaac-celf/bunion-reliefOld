<div class="{{ $block->classes }} ">
    {{-- <InnerBlocks allowedBlocks='{{ $allowedBlocks }}' template='{{ $template }}' /> --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach ($tabs as $tab => $value)
            <li class="nav-item" role="presentation">
                <button class="nav-link tab-link {{ $value->active ? 'active' : '' }} bg-secondary text-primary"
                    id="home-tab" data-bs-toggle="tab" data-bs-target="#{{ $value->ID }}" type="button" role="tab"
                    aria-controls="home" aria-selected="true">{{ $value->post_title }}</button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content shadow">
        @foreach ($tabs as $tab => $value)
            <div class="tab-pane fade show" id="{{ $value->ID }}" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <x-single-tab :id="$value->ID" />
            </div>
        @endforeach
    </div>
</div>
