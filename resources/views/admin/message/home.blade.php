@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">

                    <div class="card-body">
                        @if (count($messages))
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Message Nr.</th>
                                        <th>From</th>
                                        <th>E-Mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($messages as $message)
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
                                                <form class="d-inline-block"
                                                    action="{{ route('contact.destroy', $message->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a class="h-100 btn btn-warning"
                                                    href="{{ route('contact.show', $message->id) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            There aren't messages on pending. Great Work!
                        </div>
                        @endif
                    </div>
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
@endsection
