@extends('layouts.app')

@section('content')
<div id="app1">
        <div class="row">
            <div class="col-md-12">
                <order-qr></order-qr>
				
            </div>
        </div>
    </div>
	
@endsection
{{--<order-qr :data="{{json_encode($body)}}"></order-qr>--}}