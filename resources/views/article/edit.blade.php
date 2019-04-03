@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit article') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('update', $article->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="usr">Avartar:</label>
                                <img style="width: 100px" src='/../images/{{$article->image_link}}'>
                            </div>
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input placeholder="{{ $article->title }}" type="text" class="form-control" name="title"
                                       id="title">
                            </div>
                            <div class="form-group">
                                <label for="comment">Content:</label>
                                <textarea placeholder="{{ $article->content }}" class="form-control" rows="5"
                                          name="content" id="content"></textarea>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input-group">
                                  <span class="input-group-btn">
                                      <span class="btn btn-default btn-file">
                                          <input type="file" id="image_link" name="image_link">
                                      </span>
                                  </span>

                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
