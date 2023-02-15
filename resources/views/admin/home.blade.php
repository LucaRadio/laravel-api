@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="jumbotron p-5 mb-4 rounded-3 ">
            <h1>PortFolio</h1>
            <p class="fs-5">Here's my projects list</p>
            @if (Auth::user())
                <div class="text-center">
                    <a class="btn btn-success my-5 p-3 " href="{{ route('projects.create') }}">
                        Add Project
                    </a>
                    <a class="btn btn-info my-5 p-3 " href="{{ route('type.create') }}">
                        Add Type
                    </a>
                    <a class="btn btn-success my-5 p-3 " href="{{ route('technology.create') }}">
                        Add Technology
                    </a>
                </div>
            @endif
            {{ $projects->links() }}
            <div class="row row-cols-3 g-3 mb-3">
                @foreach ($projects as $project)
                    <div class="col">
                        <div class="card h-100 text-white bg-secondary mb-3">
                            <div class="card-header">{{ $project->name }}</div>
                            <div class="card-body text-center">
                                <img class="w-50" src="{{ asset('storage/' . $project->img_cover) }}">
                                <p class="card-text mt-5">{{ Str::limit($project->description, 100) }}</p>
                                <a class="btn btn-warning" href="{{ route('projects.show', $project->id) }}">See
                                    details</a>
                                @if (Auth::user())
                                    <a class="btn btn-info" href="{{ route('projects.edit', $project->id) }}">Modify</a>

                                    <form class="d-inline-block" method="POST"
                                        action="{{ route('projects.destroy', $project->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash text-white"></i></button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $projects->links() }}
        </div>
        <script>
            const forms = document.querySelectorAll("form");
            forms.forEach(form => {
                form.addEventListener("click", (e) => {
                    e.preventDefault();
                    const submit = confirm("Are you sure ?");
                    if (submit === true) {
                        form.submit();
                    }
                });
            });
        </script>
    </div>
@endsection
