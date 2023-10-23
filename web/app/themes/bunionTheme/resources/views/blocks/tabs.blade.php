<div class="{{ $block->classes }} ">
    @if ($tabs)
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach ($tabs as $tab => $value)
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-link {{ $value->active ? 'active' : '' }} bg-secondary text-primary"
                        id="home-tab" data-bs-toggle="tab" data-bs-target="#{{ $value->ID }}" type="button"
                        role="tab" aria-controls="home" aria-selected="true">{{ $value->post_title }}</button>
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
    @endif
</div>

<div class="accordion accordionTabs" id="tabAccordion">
    @if ($tabs)
        @foreach ($tabs as $tab => $value)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{ $tab }}" aria-expanded="false" aria-controls="collapseOne">
                        {{ $value->post_title }}
                    </button>
                </h2>
                <div id="{{ $tab }}" class="accordion-collapse collapse" data-bs-parent="#tabAccordion">
                    <div class="accordion-body p-0">
                        <x-single-tab :id="$value->ID" />
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
