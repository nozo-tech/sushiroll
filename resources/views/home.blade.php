@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            @foreach (\App\Models\Roll::all() as $roll)
                <div class="card my-4">
                    <div class="card-header">{{ $roll->rollType->name }}</div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $roll->title }}</h5>
                        <p class="card-text">{{ $roll->description }}</p>
                        <a href="{{ route('roll.show', $roll) }}" class="btn btn-primary">{{ __('Watch') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
