<div>
    <div class="card">
        <div class="card-header">{{ __('Video Roll') }}</div>
        <video
            id="roll-video-player"
            class="video-js card-img-top"
            controls
            preload="auto"
            poster="{{ sset('storage/media/videos/'.$roll->id.'/poster.jpg') }}"
            data-setup="{}"
        >
            <source src="{{ sset('storage/media/videos/'.$roll->id.'/video.mkv') }}" type="video/x-matroska">
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
        <div class="card-body">
            <h5 class="card-title">{{ $roll->title }}</h5>
            <p class="card-text">{{ $roll->description }}</p>
        </div>
    </div>
</div>
