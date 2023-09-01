<div class="row">
    <div class="col">
        <div class="d-flex flex-start">
            <div class="flex-grow-1 flex-shrink-1">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">A User</div>

                        <div class="card-body">
                            @isset($rollComment->title)
                                <h5 class="card-title">{{ $rollComment->title }}</h5>
                            @endisset
                            <p class="card-text">{{ $rollComment->description }}</p>
                        </div>
                    </div>
                    <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                </div>
                @foreach ($rollComment->rollComments as $rollComment)
                    <div class="px-4 mt-4">
                        <x-roll-comment :$rollComment />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
