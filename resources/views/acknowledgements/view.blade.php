@extends('layouts.main')

@section('title', 'View')

@section('content')


    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $ack->title }}">
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="files">Attachments</label>
                @foreach ($ack->attachments as $attachment)
                    <a class="btn btn-success btn-sm" target="_blank"
                        href="{{ asset('/attachments/acknowledgements/') . $attachment->file_name }}">{{ $attachment->file_name }}</a>
                @endforeach

            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="create_date">Create Date</label>
                <input type="text" class="form-control" name="create_date" id="create_date" readonly
                    value="{{ $ack->create_date }}">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" class="form-control" readonly>{{ $ack->description }}</textarea>
            </div>
        </div>



    </div>





@endsection
