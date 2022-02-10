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
                                    @foreach ($users as $user)
                                        <form method="post" action="{{ url('/addRole') }}" class="form">
                                            {{ csrf_field() }}
                                            <!-- -->
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                @if ($user->id == 1)
                                                    <td>Admin</td>
                                                    <td>Admin</td>
                                                    <td>Admin</td>
                                                @else
                                                    <td>
                                                        <input type="checkbox" name="role_user"
                                                            onChange="this.form.submit()"
                                                            {{ $user->hasRole('user') ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="role_editor"
                                                            onChange="this.form.submit()"
                                                            {{ $user->hasRole('editor') ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="role_admin"
                                                            onChange="this.form.submit()"
                                                            {{ $user->hasRole('admin') ? 'checked' : '' }}>
                                                    </td>
                                                @endif
                                            </tr>
                                        </form>
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
