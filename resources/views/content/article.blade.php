@extends('layouts.master')
@section('body')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar: 'false',
        });
    </script>
    <style>
        .media-list .media img {
            width: 64px;
            height: 64px;
            border: 2px solid #e5e7e8;
        }

        .media-list .media {
            border-bottom: 1px dashed red;
            margin-bottom: 25px;
        }

        .bor {
            border: 1px solid #e5e7e8;
            border-radius: 2px;
            margin-left: 2px;
        }

    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>
                    {{ $article->title }}
                </h1>
            </div>
            <div class="col-md-8 bor">
                {!! $article->body !!}
            </div>
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Comment Panel</div>
                    <div class="card-body">
                        @auth
                            <form method="post" class="form-horizontal"
                                action="{{ url('/addcomment/' . $article->id . '/' . Auth::user()->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group mt-3">
                                    <textarea id="mytextarea" name="body">About the article</textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-info pull-right">Post</button>
                            </form>
                        @else
                            <strong>Log in to be able to comment</strong>
                        @endauth
                        <hr>
                        <ul class="media-list">
                            @foreach ($article->comments as $comment)
                                <li class="media">
                                    <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">30 min ago</small>
                                        </span>
                                        <strong class="text-success">{{ $comment->user->name }}</strong>
                                        <p>
                                            {!! $comment->body !!}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
