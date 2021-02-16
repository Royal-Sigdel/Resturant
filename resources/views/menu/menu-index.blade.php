@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        <div class="row">
            <div class='col-md-12'>
                <menu-container :items="{{ json_encode($menus) }}" :resto-id={{$restoId}}>
                </menu-container>
            </div>
        </div>
    </div>
</div>
@endsection