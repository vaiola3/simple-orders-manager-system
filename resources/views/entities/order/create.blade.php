@extends('layouts.edit')


@section('form_content')
<div class="form-group row">
    <label 
        for="name" 
        class="col-md-4 col-form-label text-md-right">
        Cliente
    </label>

    <div class="col-md-6">
        <select 
            class="form-control" 
            id="client"
            name="client">

            <option selected>Selecione um cliente</option>

            @foreach ($args['clients'] as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach

        </select>

        @error('client')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label 
        for="delivery_type" 
        class="col-md-4 col-form-label text-md-right">
        Tipo de Entrega
    </label>

    <div class="col-md-6">
        <select 
            class="form-control" 
            id="delivery_type"
            name="delivery_type">

            <option value="" selected>Selecione um tipo de entrega</option>

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

<div class="form-group row">
    <label 
        for="dishes" 
        class="col-md-4 col-form-label text-md-right">
        Pratos
    </label>

    <div class="col-md-6">
        <select 
            class="overflow-hidden"
            id="select-dishes"
            name="dishes[]" 
            multiple="multiple">

            @foreach ($args['dishes'] as $dish)
            <option value="{{ $dish->id }}">{{ $dish->name }}</option>
            @endforeach

        </select>

        @error('dishes')
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
