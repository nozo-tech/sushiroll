@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @switch($roll->rollType->type)
                @case('text')
                    <x-roll-text :$roll />
                    @break
                @case('video')
                    <x-roll-video :$roll />
                    @break
                @case('gallery')
                    <x-roll-gallery :$roll />
                    @break
                @case('live')
                    <x-roll-live :$roll />
                    @break

                @default

            @endswitch

            <div class="my-4">
                @forelse ($roll->rollComments as $rollComment)
                    <x-roll-comment :$rollComment />
                @empty
                    <div class="alert alert-info" role="alert">
                        {{ __('There are no comments, be the first one to comment!') }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
