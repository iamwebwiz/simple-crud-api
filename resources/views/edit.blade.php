@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Movie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url("/api/movies/{$movie['id']}") }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>{{ __('Title') }}</label>
                                <input type="text" name="title" class="form-control" value="{{ $movie['title'] }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Genre') }}</label>
                                <input type="text" name="genre" class="form-control" value="{{ $movie['genre'] }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Image') }}</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Synopsis') }}</label>
                                <textarea name="synopsis" class="form-control">{{ $movie['synopsis'] }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Movie</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
