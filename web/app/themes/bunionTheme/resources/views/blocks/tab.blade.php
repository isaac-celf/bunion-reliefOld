<div class="tab">
    <div class="tab-title">
        <button class="btnTab">{{ $tabTitle }}</button>
    </div>
    <div class="tab-body row align-items-center m-auto">
        <img src="{{ $tabImage['url'] }}" alt="picture 1" class="tab-img col-4">

        <div class="tab-description col-8">
            <h2>{{ $tabTitle }}</h2>
            <p>{{ $tabContent }}</p>
        </div>
    </div>
</div>
