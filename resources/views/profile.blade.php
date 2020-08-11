@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">

            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/user.png" />
                    <!-- badge -->
                    <div class="rank-label-container col-md-12">
                        <span class="col-md-8 label label-default rank-label">{{Auth::user()->name}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file"  class = 'col-md-12'name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>
                <button type="submit" class="form-control btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
