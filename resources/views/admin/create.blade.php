@extends('layouts.master')

@section('body')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar: 'false',
        });
    </script>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Session::has('errors'))
                        <div class="card alert alert-danger pt-2">
                            <div class="card-body">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="card alert alert-success">
                            <div class="card-body">
                                {{Session::get('message')}}
                            </div>
                        </div>
                    @endif
                    <div class="card-header">Add a new article</div>
                    <div class="card-body">                                                              
                        <form method="post" class = "form-horizontal" action = "{{url('/addarticle/' . Auth::user()->id)}}" enctype = "multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" name = "title" placeholder = "Article title here" class = "form-control">
                            </div>
                            <div class="form-group mt-3">
                                <textarea id="mytextarea" name = "body">About the article</textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class = "form-control mt-2" name = "thumbnail" accept = "image/*">
                            </div>
                            <div class="form-group">
                                <input type="submit" value = "Add" class = "mt-2 btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
