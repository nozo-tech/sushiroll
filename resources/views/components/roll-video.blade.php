<div>
    <div class="card">
        <div class="card-header">{{ __('Video Roll') }}</div>
        <video class="card-img-top" alt="Card image cap">
            <source src="{{ $roll->content }}" type="video/mp4">

        </video>
        <div class="card-body">
            <h5 class="card-title">{{ $roll->title }}</h5>
            <p class="card-text">{{ $roll->description }}</p>
        </div>
    </div>
</div>
