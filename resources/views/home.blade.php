@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        <menu-container 
        :items="{{ json_encode($menus) }}"
        :resto-id={{$restoId}}>
        </menu-container>
    </div>
</div>
@endsection
