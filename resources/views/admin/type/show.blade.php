@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row p-4 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('storage/' . $project->img_cover) }}" class="mx-auto w-50 card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text">Type: {{ $project->type->name }}</p>

                        @auth
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Modify</a>
                        @endauth
                        <a href="{{ $project->github_link }}" class="btn btn-warning">Go to repository</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
