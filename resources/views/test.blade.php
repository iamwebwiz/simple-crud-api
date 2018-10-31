@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Movie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('api.movies.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Title') }}</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
