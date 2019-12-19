@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('css/beginning.css')}}">
@endsection

@section('title' , 'Welcome')

@section('header')
<div class="header text-center text-light">
    <h1 class="Judul">Events Organizer</h1>
    <p class="subJudul">Lorem, ipsum dolor.</p>
    <hr color="white" width="60%">
    <a href="user/" class="btn btn-primary">Lihat Semua Event</a>
</div>
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container text-center">
            <h2>Lorem, ipsum.</h2>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 isi">
                    <h2>Lorem, ipsum.</h2>
                    <img width="27%" src="http://icons.iconarchive.com/icons/blackvariant/button-ui-system-folders-alt/512/Group-icon.png" alt="">
                    <br>
                    <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 isi">
                    <h2>Lorem, ipsum.</h2>
                    <img width="27%" src="http://icons.iconarchive.com/icons/graphicloads/flat-finance/256/dollar-icon.png" alt="">
                    <br>
                    <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 isi">
                    <h2>Lorem, ipsum.</h2>
                    <img width="27%" src="https://vignette.wikia.nocookie.net/future/images/6/6c/Star_and_Crescent.png/revision/latest?cb=20160910020315" alt="">
                    <br>
                    <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('js')
@endsection('js')