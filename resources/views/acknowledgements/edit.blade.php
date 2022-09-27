@extends('layouts.main')

@section('title', 'Edit')

@section('content')

    <form action="{{ route('ack.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title') ?? $ack->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="files">Attachments</label>
                    <input type="file" class="form-control" name="files[]" id="files" multiple>
                    @error('files')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div> --}}

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" class="form-control">{{ old('description') ?? $ack->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn-btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>




@endsection
