@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('css/allevent.css')}}">
@endsection

@section('title', 'Event')

@section('header')
@endsection
@section('content')
<div class="jumbotron content2">
        <div class="container text-center">
            <h3>All of the Event you can see it here</h3>
            <p>Enjoy your day.</p>
            <hr class="garis">
        </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
        <br>
            <div class="row row-cols-ms-1 row-cols-md-4">
                @foreach($event as $evnt)
                <div class="col mb-3">
                    <div class="card h-100">
                    <img src="{{asset('storage/photo/' .$evnt->photo)}}" width="27%" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$evnt->name_event}}</h5>
                        <p class="card-text">Date  = {{$evnt->date_start}} s.d {{$evnt->date_finish}}</p>
                        <p class="card-text">Location = {{$evnt->location}}</p>
                    </div>
                        <a href="/user/{{$evnt->id}}" class="btn btn-primary tombol">Detail Event</a>
                    </div>
                </div>
               @endforeach
            </div>
    </div>
@endsection
@section('js')
@endsection