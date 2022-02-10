@extends('layouts.master')

@section('body')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Control Panel
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                @if (Session::has('message'))
                                    <div class="card alert alert-success">
                                        <div class="card-body">
                                            {{ Session::get('message') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <a href="{{ url('/addarticle') }}" class="btn btn-primary">Add Article New</a>
                            </div>
                            <div class="col-md-12 mb-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>History Added</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td><a href="{{ url('/editarticle/' . $item->id) }}"
                                                        class="btn btn-danger">Edit</a></td>
                                                <td>
                                                    <form action="{{ url('/deletearticle/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="Delete" />
                                                        <input type="hidden" name="_method" value="delete" />
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $articles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
