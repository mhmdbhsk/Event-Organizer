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
                    <h4>Participant</h4>
                </div>
                <hr class="garis">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Participant</th>
                        <th scope="col">Email</th>
                        <th scope="col">Event</th>
                        <th scope="col">Option</th>
                        </tr>
                        <?php
                            $no = 1;
                        ?>
                    </thead>
                    <tbody>
                        @foreach($participants as $acc)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$acc->name}}</td>
                            <td>{{$acc->email}}</td>
                            <td>{{$acc->name_event}}</td>
                            <td>
                                <form action="/admin/participants/{{$acc->id}}" method="post">
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