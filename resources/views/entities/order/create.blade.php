@extends('template.main', compact('args'))

@section('content')

@component('components.title', compact('args'))
@endcomponent

<h5>create order</h5>

@endsection
