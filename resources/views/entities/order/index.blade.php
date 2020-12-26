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
            <th scope="col">Cliente</th>
            <th scope="col">Pratos</th>
            <th scope="col">Última Entrega</th>
            <th scope="col">Entregas Realizadas</th>
            <th scope="col">Tipo</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
        <tr align="center">
            <td>{{ $item->id }}</td>
            <td>{{ $item->client_id }}</td>
            <td>{{ $item->delivery_type_id }}</td>
            <td>ultima_entrega</td>
            <td>99</td>
            <td>tipo</td>
            <td>
                <a 
                    href="{{ route('orders.edit', [$item->id]) }}" 
                    class="btn btn-sm own-yellow shadow-sm">
                    Editar
                </a>
                <a 
                    href="{{ route('orders.delete', [$item->id]) }}" 
                    class="btn btn-sm own-red shadow-sm">
                    Inativar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection