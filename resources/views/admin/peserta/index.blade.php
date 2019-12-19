@extends('layouts.stisla')

@section('title', 'Participants Page')

@section('css')
<link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
<link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/peserta/index.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Participants</h1>
          </div>
          <div class="section-body">
            <div class="jumbotron alas">
                <div class="text-center">
                    <h4>Heres You Got</h4>
                </div>
                <hr class="garis">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Event</th>
                        <th scope="col">Option</th>
                        </tr>
                        <?php
                            $no = 1;
                        ?>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$event->name_event}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="/admin/participants/{{$event->id}}"> <i class="fa fa-eye"> Show</i></a>
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