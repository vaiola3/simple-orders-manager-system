@extends('template.main')

@section('content')

@component('components.title', \compact('args'))
@endcomponent

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('clients.create') }}">
                        @csrf
                        @yield('form_content')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
