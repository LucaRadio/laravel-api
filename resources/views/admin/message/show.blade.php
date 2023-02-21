@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <span>Message Nr. {{ $message->id }}</span>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>

                                    @foreach ($keys as $key)
                                        <th>{{ ucFirst($key) }}</th>
                                    @endforeach
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>


                                    <td>
                                        {{ $message->id }}
                                    </td>
                                    <td>
                                        {{ $message->name }}
                                    </td>
                                    <td>
                                        {{ $message->email }}
                                    </td>
                                    <td>
                                        {{ $message->message }}
                                    </td>
                                    <td>
                                        {{ date_format($message->created_at, 'M-d') }}
                                        <br>
                                        {{ date_format($message->created_at, 'H:i') }}
                                    </td>
                                    <td>
                                        {{ date_format($message->updated_at, 'M-d') }}
                                        <br>
                                        {{ date_format($message->updated_at, 'H:i') }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('contact.destroy', $message->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a target="_blank" class="btn btn-warning"
                                            href="{{ asset('storage/' . $message->attachment) }}">
                                            <i class="fa-solid fa-paperclip"></i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
