@extends('layouts.app')
@section('content')
    <div class="row justify-content-center p-5">
        <div class="col-6 bg-dark p-3 rounded-3 text-white">
            <h2>Create project compiling form below</h2>

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="name mb-3">
                    <label>Name</label>
                    <input class="form-control @error('name') is-invalid
                        @enderror"
                        value="{{ old('name') }}" type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="type mb-3">
                    <label for="">Type</label>
                    <select name="type_id" class="form-select">

                        <option value=""></option>
                        @foreach ($typeList as $type)
                            <option value="{{ $type->id }}">
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="description mb-3">
                    <label for="">Description</label>
                    <textarea class="form-control @error('description')
                    is-invalid
                @enderror"
                        type="text" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="img_cover mb-3">
                    <label for="">Img Cover</label>
                    <input class="form-control" type="file" name="img_cover">
                    @error('img_cover')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="github_link mb-3">
                    <label for="">GitHub Link</label>
                    <input
                        class="form-control @error('github_link')
                    is-invalid
                @enderror"
                        type="text" name="github_link" value="{{ old('github_link') }}">
                    @error('github_link')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
                @foreach ($technologyList as $technology)
                    <div class="technology mb-3 d-inline-block me-3">

                        <label for="">{{ $technology->name }}</label>
                        <input class="form-check-input @error('technology') is-invalid @enderror" type="checkbox"
                            name="technologies[]" value="{{ $technology->id }}">
                    </div>
                @endforeach
                @error('technology')
                    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                @enderror

                <div class="text-center">
                    <button class="btn-info btn mt-3">Create</button>

                </div>

            </form>
        </div>
    </div>
@endsection
