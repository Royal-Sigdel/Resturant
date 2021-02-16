@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app1">
        <div class="row">
            <div class="col-md-12">
                @if($orders->count()>0)
                <div class="mb-3">
                    <a href="{{route('restos.order.add',$resto[0]->no)}}" class="btn btn-primary"> Add Order</a>
                </div>
                <manage-orders :orders="{{ json_encode($orders) }}"></manage-orders>
                {{$orders->render()}}
                @else
                <p>You don't have any orders yet. </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection