@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{asset('/css/editprofile.css')}}">
@endsection

@section('title', 'Edit Profile')

@section('header')
@endsection

@section('content')
<div class="jumbotron">
    <div class="header">
        <h2>Edit Profile</h2>
    </div>
    <br>
    <hr class="garis">

    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center form-group">
                <img src="//placehold.it/100" class="avatar img-circle" width="200px" alt="avatar">
                <br>
                <h6>Upload a different photo...</h6>
                <input type="file" class="form-control btn btn-sm btn-primary">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>

            <h3>Personal info</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Nama:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Nama">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label text-left">New Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" placeholder="New Password" value="New Password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label text-left">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" placeholder="Confirm Password" value="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label text-left"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-outline-primary" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection