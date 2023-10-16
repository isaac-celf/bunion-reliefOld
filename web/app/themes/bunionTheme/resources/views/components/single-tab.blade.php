<!-- Tab panes -->
<div class="tab row justify-content-center align-items-center">
    <div class="tab-img-box col-4 p-3 px-4">
        <img src="{{ $tabImage }}" alt="tab image 1" class="tab-img w-100 rounded">
    </div>
    <div class="tab-body col-8">
        <h3 class="text-primary fw-bold mb-3">{{ $tabTitle }}</h3>
        <p class="fw-light mb-4">{{ $tabDescription }}</p>
        @if ($tabButton)
            <div class="wp-block-button is-style-outline">
                <a href="{{ $tabButton->guid }}"
                    class="wp-block-button__link bg-primary text-white">{{ $tabButton->post_title }}</a>
            </div>
        @endif
    </div>
</div>
