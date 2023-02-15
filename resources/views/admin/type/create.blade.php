@extends('layouts.app')
@section('content')
    <div class="row justify-content-center p-5">
        <div class="col-6 bg-dark p-3 rounded-3 text-white">
            <h2>Create type compiling form below</h2>
            <form action="{{ route('type.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="name mb-3">
                    <label>Name</label>
                    <input
                        class="form-control @error('name') is-invalid
                        
                    @enderror"
                        type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center">
                    <button class="btn-info btn mt-3">Create</button>

                </div>

            </form>
        </div>
    </div>
@endsection
