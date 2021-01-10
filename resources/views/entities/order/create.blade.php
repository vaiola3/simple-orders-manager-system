@extends('layouts.edit')


@section('form_content')
<div class="form-group row">
    <label 
        for="client_id" 
        class="col-md-4 col-form-label text-md-right">
        Cliente
    </label>

    <div class="col-md-6">
        <select 
            class="form-control" 
            id="client_id"
            name="client_id">

            @if (null !== old('client_id'))
                <option value="{{ old('client_id') }}" selected>
                    {{ $args['pload']['client']->find(old('client_id'))['name'] }}
                </option>
            @else
                <option value="" selected>Selecione um cliente</option>
            @endif

            @foreach ($args['pload']['client'] as $client)
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
        for="delivery_type_id" 
        class="col-md-4 col-form-label text-md-right">
        Tipo de Entrega
    </label>

    <div class="col-md-6">
        <select 
            class="form-control" 
            id="delivery_type_id"
            name="delivery_type_id">

            @if (null !== old('delivery_type_id'))
                <option value="{{ old('delivery_type_id') }}" selected>
                    {{ $args['pload']['dtypes']->find(old('delivery_type_id'))['name'] }}
                </option>
            @else
                <option value="" selected>Selecione um tipo de entrega</option>
            @endif

            @foreach ($args['pload']['dtypes'] as $delivery_type)
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
        for="dish_id" 
        class="col-md-4 col-form-label text-md-right">
        Pratos
    </label>

    <div class="col-md-6">
        <select 
            class="overflow-hidden"
            id="select-dishes"
            name="dish_id[]" 
            multiple="multiple">

            {{-- review this --}}

            @foreach ($args['pload']['dishes'] as $dish)
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
