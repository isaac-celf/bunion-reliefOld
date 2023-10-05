<div class="stepper row justify-content-center align-items-center flex-column flex-md-row gap-5 gap-md-0 mb-5">
    <div class="stepper-img-box col-md-4 col-6">
        <img src="" alt="stepper image" class="stepper-img w-100">
    </div>

    <div class="step col-md-8 col-12">
        <div class="row">
            <div class="stepper-step d-flex flex-column px-3 px-md-5">
                <InnerBlocks allowedBlocks='{{ $allowedBlocks }}' template='{{ $template }}' />
            </div>
        </div>
    </div>


</div>
