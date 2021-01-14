@extends('layouts.edit')


@section('form_content')
<div class="form-group row">
    <label 
        for="description" 
        class="col-md-2 col-form-label text-md-right">
        Descrição
    </label>

    <div class="col-md-10">
        <input 
            id="description" 
            type="text" 
            class="form-control @error('description') is-invalid @enderror" 
            name="description" 
            value="{{ $args['pload']['description'] }}"
            required autocomplete="description" 
            autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label 
        for="cep" 
        class="col-md-2 col-form-label text-md-right">
        CEP
    </label>

    <div class="col-md-10">
        <input 
            id="cep" 
            type="text" 
            class="form-control @error('cep') is-invalid @enderror" 
            name="cep" 
            value="{{ $args['pload']['cep'] }}"
            required autocomplete="cep">

        @error('cep')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-10 offset-md-4">
        <button 
            type="submit" 
            class="btn btn-sm own-green">
            Confirmar
        </button>
    </div>
</div>
@endsection
