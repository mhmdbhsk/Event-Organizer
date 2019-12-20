@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('/css/myevent.css')}}">
@endsection

@section('title', 'My Event')

@section('header')
@endsection

@section('content')
<div class="jumbotron content2">
    <div class="container">
        <div class="text-center">
            <h3>Event's that you had join in</h3>
            <p>Lorem, ipsum dolor.</p>
            <hr class="garis">
        </div>
        <br>
        <ul style="list-style-type:none;">
            <li class="jumbotron list">
                @foreach($participant as $event)
                <div class="row">
                    <div class="col col-lg-4">
                        <img src="{{asset('storage/photo/' .$event->photo)}}" alt="..." width="100%">
                    </div>
                    <div class="col col-lg-4 text-center">
                        <h4>{{$event->name_event}}</h4>
                        <p>{{$event->description}}</p>
                    </div>
                    <div class="col col-lg-4 text-center">
                        <form class="" action="/user/{{$event->idparticipants}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Yakin ingin membatalkan ?')" name="button">Batalkan</button>
                        </form>
                    </div>
                </div>
                <br>
                @endforeach
            </li>
        </ul>
        
    </div>
</div>
@endsection

@section('js')
@endsection