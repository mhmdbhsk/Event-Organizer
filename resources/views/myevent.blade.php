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
                <div class="row">
                    <div class="col col-lg-2">
                        <img src="..." alt="..." width="27%">
                    </div>
                    <div class="col col-lg-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A officia veniam inventore debitis aliquam consequuntur atque dolorem ipsam commodi, doloribus reiciendis odio iure ab perferendis voluptate ipsa!</p>
                    </div>
                    <div class="col col-lg-5 text-center">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Detail</button>
                        &nbsp
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Batalkan</button>
                    </div>
                </div>
            </li>
            <li class="jumbotron list">
                <div class="row">
                    <div class="col col-lg-2">
                        <img src="..." alt="..." width="27%">
                    </div>
                    <div class="col col-lg-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A officia veniam inventore debitis aliquam consequuntur atque dolorem ipsam commodi, doloribus reiciendis odio iure ab perferendis voluptate ipsa!</p>
                    </div>
                    <div class="col col-lg-5 text-center">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Detail</button>
                        &nbsp
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Batalkan</button>
                    </div>
                </div>
            </li>
            <li class="jumbotron list">
                <div class="row">
                    <div class="col col-lg-2">
                        <img src="..." alt="..." width="27%">
                    </div>
                    <div class="col col-lg-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A officia veniam inventore debitis aliquam consequuntur atque dolorem ipsam commodi, doloribus reiciendis odio iure ab perferendis voluptate ipsa!</p>
                    </div>
                    <div class="col col-lg-5 text-center">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Detail</button>
                        &nbsp
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Batalkan</button>
                    </div>
                </div>
            </li>
        </ul>
        
    </div>
</div>
@endsection

@section('js')
@endsection