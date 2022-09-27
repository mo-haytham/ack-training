@extends('layouts.main')

@section('title', 'Acknowledgements')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex justify-content-end">
                <a href="{{ route('ack.create') }}" class="btn btn-success btn-sm">Create
                    Acknowledgement</a>
            </div>
        </div>
        <div class="col-sm-12">
            @if (count($acks) > 0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acks as $ack)
                            <tr>
                                <td>{{ $ack->title }}</td>
                                <td>{{ $ack->description }}</td>
                                <td>{{ $ack->create_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-danger">No Acknowledgements found.</h3>
            @endif
        </div>
    </div>

@endsection
