@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add article') }}</div>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif



                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"  action="{{ route('store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Content:</label>
                                <textarea class="form-control" rows="5" name="content" id="content" required></textarea>
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

                                    <button style="margin-right: 10px; margin-left: 10px" type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{ URL::previous() }}">Back</a>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
