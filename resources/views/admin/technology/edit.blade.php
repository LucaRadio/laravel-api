@extends('layouts.app')
@section('content')
    <div class="row justify-content-center p-5">
        <div class="col-6 bg-dark p-3 rounded-3 text-white">
            <h2>Modify form for <span class="text-primary">{{ $technology->name }}</span></h2>
            <form action="{{ route('technology.update', $technology->id) }}" method="POST"
                enctechnology="multipart/form-data">
                @csrf
                @method('put')
                <div class="name mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $technology->name }}">
                    @error('name')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>



                <div class="text-center">
                    <button class="btn-info btn mt-3">Modify</button>

                </div>

            </form>
        </div>
    </div>
@endsection
