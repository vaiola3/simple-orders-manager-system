@extends('template.main', \compact('args'))

@section('content')

@component('components.title', \compact('args'))
@endcomponent

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered table-hover">
        @yield('thead')
        @yield('tbody')
    </table>
</div>

@endsection