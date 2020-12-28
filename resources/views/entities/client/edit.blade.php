@extends('layouts.edit')


@section('form_content')
<div class="form-group row">
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
            value="{{ $args['client']->name }}" 
            required autocomplete="name" 
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
        for="contact" 
        class="col-md-4 col-form-label text-md-right">
        Contato
    </label>

    <div class="col-md-6">
        <input 
            id="contact" 
            type="contact" 
            class="form-control @error('contact') is-invalid @enderror" 
            name="contact" 
            value="{{ $args['client']->contact }}" 
            required autocomplete="contact">

        @error('contact')
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
