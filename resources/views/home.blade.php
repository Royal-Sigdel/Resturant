@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        <resto-group :restos="{{json_encode($restos)}}" :resto-id={{$restoId}}>
        </resto-group>
    
    </div>
</div>
@endsection