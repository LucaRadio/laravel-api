@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ __('Technology List') }}</span>
                        <a href="{{ route('technology.create') }}" class="btn btn-warning">
                            <i class="fa-solid fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($technologyList as $technology)
                                    <tr>
                                        <td>{{ $technology->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('technology.edit', $technology->id) }}"
                                                    class="btn btn-info me-2">
                                                    <i class="fa-solid text-black fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('technology.destroy', [
                                                        'technology' => $technology->id,
                                                        'deleting' => true,
                                                    ]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fa-solid text-black fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ __('Type List') }}</span>
                        <a href="{{ route('type.create') }}" class="btn btn-warning">
                            <i class="fa-solid fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($typeList as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('type.edit', $type->id) }}" class="btn btn-info me-2">
                                                    <i class="fa-solid text-black fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('type.destroy', [
                                                        'type' => $type->id,
                                                        'deleting' => true,
                                                    ]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fa-solid text-black fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ __('Projects') }}</span>
                        <a href="{{ route('projects.create') }}" class="btn btn-warning">
                            <i class="fa-solid fa-plus"></i></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Img Link</th>
                                    <th>Github Link</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->type->name ?? 'ciao' }}</td>
                                        <td>{{ Str::limit($project->description, 50) }}</td>
                                        <td>{{ Str::limit($project->img_cover, 20) }}</td>
                                        <td>{{ Str::limit($project->github_link, 20) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('projects.edit', $project->id) }}"
                                                    class="btn btn-info me-2">
                                                    <i class="fa-solid text-black fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('projects.destroy', $project->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fa-solid text-black fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
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
