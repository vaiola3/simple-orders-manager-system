@extends('layouts.edit')


@section('form_content')
{{-- <div class="form-group row">
    <label 
        for="name" 
        class="col-md-4 col-form-label text-md-right">
        Nome
    </label>

    <div class="col-md-6">
        <input 
            id="name" 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            name="name" 
            value="{{ $args['order']->client['name'] }}" 
            required autocomplete="name" 
            autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div> --}}

<div class="form-group row">
    <label 
        for="name" 
        class="col-md-4 col-form-label text-md-right">
        Cliente
    </label>

    <div class="col-md-6">
        <select class="form-control" id="exampleFormControlSelect1">

            @foreach ($args['clients'] as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach

        </select>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label 
        for="name" 
        class="col-md-4 col-form-label text-md-right">
        Tipo de Entrega
    </label>

    <div class="col-md-6">
        <select class="form-control" id="exampleFormControlSelect1">

            @foreach ($args['delivery_types'] as $delivery_type)
                <option value="{{ $delivery_type->id }}">{{ $delivery_type->name }}</option>
            @endforeach

        </select>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button 
            type="submit" 
            class="btn btn-sm own-green">
            Confirmar
        </button>
    </div>
</div>
@endsection
