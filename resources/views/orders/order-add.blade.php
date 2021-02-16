@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        {{--<div class="row mb-3">
            <div class="col-md-12">
                <h2>Order Details for {{$resto->name}}</h2>
            </div>
        </div>--}}
        <div class="row">
            <div class="col-md-12">
                <order-group :resto-id="{{$id}}"></order-group>
            </div>
        </div>
    </div>
</div>
@endsection