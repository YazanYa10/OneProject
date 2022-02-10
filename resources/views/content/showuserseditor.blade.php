@extends('layouts.master')
<!--    <div class="row justify-content-center"> -->
@section('body')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card mb-4">
                    <div class="card-header">
                    <h4>Control Panel</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>User</th>
                                    <th>Editor</th>
                                    <th>Admin</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @if ($user->id == 1)
                                            <td>Admin</td>
                                            <td>Admin</td>
                                            <td>Admin</td>
                                        @else
                                            <td>
                                                @if ($user->hasRole('user'))
                                                    <p>&#10004;</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->hasRole('editor'))
                                                    <p>&#10004;</p>
                                                @endif  
                                            </td>
                                            <td>
                                                @if ($user->hasRole('admin'))
                                                    <p>&#10004;</p>
                                                @endif 
                                            </td>
                                        @endif                            
                                        </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop