@extends('layouts.stisla')

@section('title', 'Users Page')

@section('css')
<link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
<link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/user/index.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users</h1>
          </div>
          <div class="section-body">
            <div class="jumbotron alas">
                <div class="text-center">
                    <h4>Heres You Got</h4>
                </div>
                <hr class="garis">
                <a href="/admin/users/create" class="btn btn-success">Add User</a>
                <br><br>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Option</th>
                        </tr>
                        <?php
                            $no = 1;
                            // $users = DB::table('users')->where('status', '=', 'user')->get();
                         ?>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                    <button type="button" class="btn btn-sm btn-primary" name="button"
                                    onclick="location.href='/admin/users/{{$user->id}}/edit'"><i class="fa fa-pencil"> Edit</i>
                                    </button>
                                    <form action="/admin/users/{{$user->id}}" class="d-inline" method="post">
                                     @method('delete')
                                     @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" name="button"
                                    onclick="confirm('Yakin ingin menghapus ?')"><i class="fa fa-trash"> Delete</i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </section>
    </div>
@endsection