@extends('layouts.master')

@section('body')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Welcome</h1>
            <p class="lead text-muted">Hello friends, welcome to my new blog </p>
        </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($articles as $item)
              <div class="col">
                <div class="card shadow-sm">
               <img src="{{url('/uploads/'.$item->thumbnail)}}" class="bd-placeholder-img card-img-top" with="100%">
                  <div class="card-body">
                    <p class="card-text"><a href="{{url('/article/'.$item->id)}}">{{$item->title}}</a></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <strong>written by:</strong><small class="text-muted">{{$item->user->name}}</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <strong>I wrote on :</strong><small class="text-muted">{{$item->created_at}}</small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection