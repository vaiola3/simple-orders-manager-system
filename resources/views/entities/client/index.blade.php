@extends('template.main', [
    'current_view' => $current_view
])

@section('content')

@component('components.title', [
    'title' => $title,
    'show_options' => $show_options,
    'inactive_itens_route' => $inactive_itens_route
])
@endcomponent

<table class="table table-sm table-striped">
    <thead class="thead-dark">
        <tr align="center">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Contato</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $item)
        <tr align="center">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->contact }}</td>
            <td>
                <a 
                    href="{{ route('clients.edit', [$item->id]) }}" 
                    class="btn btn-sm own-green shadow-sm">
                    Endereços
                </a>
                <a 
                    href="{{ route('clients.edit', [$item->id]) }}" 
                    class="btn btn-sm own-yellow shadow-sm">
                    Editar
                </a>
                <a 
                    href="{{ route('clients.delete', [$item->id]) }}" 
                    class="btn btn-sm own-red shadow-sm">
                    Inativar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection