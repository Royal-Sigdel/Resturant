@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        <div class="row">
            <div class="col-md-12">
                <resto-group :restos="{{json_encode($restos)}}"></resto-group>
            </div>
        </div>
    </div>
</div>
@endsection