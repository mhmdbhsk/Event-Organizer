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
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-success btn-md"
                    onclick="location.href='/admin/users/create'">Add User</button>
                    &nbsp &nbsp
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-warning dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laporan
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/user/pdf" class="dropdown-item">PDF</a></li>
                            <li><a href="/admin/user/excel" class="dropdown-item">Excel</a></li>
                        </ul>
                    </div>
                </div>
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