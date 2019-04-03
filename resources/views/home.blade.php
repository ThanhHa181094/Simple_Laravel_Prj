@extends('layouts.app')

@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table>
                    <tr>
                        <td>
                            <form style="margin-bottom: 20px" method="get" action="{{ route('add') }}">
                                <button style="width: 100px" class="btn btn-primary">Add article</button>
                            </form>
                        </td>
                        <td>
                            <form style="margin-bottom: 20px; margin-left: 20px" method="get"
                                  action="{{ route('search') }}">
                                <div style="float: left">
                                    <button style="margin-bottom: 20px; width: 100px" type="submit"
                                            class="btn btn-primary">Search
                                    </button>
                                </div>
                                <div style="float: left">
                                    <input type="text" class="form-control" name="searchText" id="searchText">
                                </div>


                            </form>
                        </td>

                    </tr>
                </table>
                <div class="card">

                    <div class="card-body" style="width: 100%">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div style="width: 100%" class="btn-group-vertical" role="group" aria-label="Basic example">
                            <table class="table table-striped" style="width: 100%;">
                                <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Image</td>
                                    <td>Title</td>
                                    <td>Content</td>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($article as $articles)
                                    <tr>
                                        <td>{{$articles->id}}</td>
                                        <td><img style="width: 50px" src="/../images/{{$articles->image_link}}"></td>
                                        <td>{{$articles->title}}</td>
                                        <td>{{$articles->content}}</td>
                                        <td><a href="{{ route('edit', $articles->id ) }}"
                                               class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('delete', $articles->id ) }}" method="get">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>

                                    </tr>


                                @endforeach
                                </tbody>
                            </table>
                            {{ $article->appends(Request::get('home'))->links()}}
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
