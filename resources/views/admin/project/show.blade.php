<?php
$print = [];

?>


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
                        <p class="card-text"><span class="fw-bold">Type: </span>{{ $project->type->name }}</p>
                        <div class="card-text mb-3"><span class="fw-bold">Used technologies: </span>
                            @if (count($project->technologies) >= 1)
                                @foreach ($project->technologies as $item)
                                    @if (!in_array($item->name, $print))
                                        <?php $print[] = $item; ?>
                                    @endif
                                @endforeach
                                @foreach ($print as $language)
                                    {{ $language->name }}
                                @endforeach
                            @else
                                {{ "There's no information on this project" }}
                            @endif
                        </div>

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
