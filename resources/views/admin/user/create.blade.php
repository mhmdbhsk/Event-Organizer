@extends('layouts.stisla')

@section('title', 'Users Page')

@section('css')
<link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
<link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/user/create.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create Page</h1>
          </div>
          <div class="section-body">
            <div class="jumbotron alas">
                <div class="text-center">
                    <h4>Add an User</h4>
                </div>
                <hr class="garis">
                <form method="post" action="/admin/users">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" placeholder="Write the Users Name here" name="name" autocomplete="off" value="{{old('name')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>     
                        @enderror    
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Write the Users Email here" name="email" autocomplete="off" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Write the Password here" name="password" autocomplete="off" value="{{old('password')}}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="/admin/users" class="btn btn-md btn-danger">Batalkan</a>
                </form>
            </div>
          </div>
        </section>
    </div>
@endsection