@extends('layouts.stisla')

@section('title', 'Event Page')

@section('css')
<link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
<link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/event/index.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Event</h1>
          </div>
          <div class="section-body">
            <div class="jumbotron alas">
                <div class="text-center">
                    <h4>Heres You Got</h4>
                </div>
                <hr class="garis">
                <a href="/admin/events/create" class="btn btn-success">Create Data</a>
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
                        <th scope="col">Name Event</th>
                        <th scope="col">Date Start</th>
                        <th scope="col">Date Finish</th>
                        <th scope="col">Quota</th>
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
                            <td>{{$event->date_start}}</td>
                            <td>{{$event->date_finish}}</td>
                            <td>{{$event->quota}}</td>
                            <td>
                                <button class="btn btn-primary" type="button" name="edit"><i class="fa fa-pencil" onclick="location.href='/admin/events/{{$event->id}}/edit'"> Edit</i></button>
                                <form action="/admin/events/{{$event->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit" name="delete" onclick="confirm('Yakin ingin menghapus ?')"><i class="fa fa-trash"> Delete</i></button>
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