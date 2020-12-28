@extends('layouts.index', \compact('args'))

@section('thead')
<thead class="thead-dark">
    <tr align="center">
        <th scope="col">ID</th>
        <th scope="col">Cliente</th>
        <th scope="col">Tipo de Entrega</th>
        <th scope="col">Última Entrega</th>
        <th scope="col">Entregas Realizadas</th>
        <th scope="col">Tipo</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
@endsection

@section('tbody')
<tbody>
    @foreach ($args['orders'] as $item)
    <tr align="center">
        <td>{{ $item->id }}</td>
        <td>{{ $item->client['name'] }}</td>
        <td>{{ $item->deliveryType['name']}}</td>
        <td>ultima_entrega</td>
        <td>99</td>
        <td>{{ $item->deliveryType['name']}}</td>
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
@endsection