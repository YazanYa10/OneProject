@extends('layouts.master')

@section('body')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }}</div>
                    <div class="card-body">
                        @foreach (Auth::user()->roles as $item)
                            <strong>User role:</strong>{{ $item->name }} <br>
                            <strong>User role description :</strong>{{ $item->description }} <br>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
