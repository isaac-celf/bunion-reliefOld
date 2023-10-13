<div class="{{ $block->classes }} alignfull my-0">
    <div class="video-bg position-relative h-100">
        @if ($bgVideo)
            <video src="{{ $bgVideo['url'] }}" autoplay loop muted class="video w-100 h-100"></video>
        @endif

        <div class="position-absolute top-50 start-50 transform-position">
            <InnerBlocks />
        </div>
    </div>

</div>
