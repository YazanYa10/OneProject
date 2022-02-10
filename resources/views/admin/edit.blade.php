@extends('layouts.master')

@section('body')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar: 'false',
            language: 'ar'
        });
    </script>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('errors'))
                        <div class="card alert alert-danger pt-2">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="card alert alert-success">
                            <div class="card-body">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="card-header">Edit Article</div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ url('/editarticle/' . $article->id) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <input type="text" name="title" value="{{ $article->title }}" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <textarea id="mytextarea" name="body">{{ $article->body }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <img src="{{ url('/uploads/' . $article->thumbnail) }}"
                                    class="bd-placeholder-img card-img-top" with="100%">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control mt-2" name="thumbnail" accept="image/*">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Edit" class="mt-2 btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
