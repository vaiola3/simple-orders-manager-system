@extends('template.main', [
    'current_view' => $current_view
])

@section('content')

@component('components.title', [
    'title' => $title,
    'show_options' => $show_options,
    'inactive_itens' => $inactive_itens,
])
@endcomponent

<h5>create order</h5>

@endsection
