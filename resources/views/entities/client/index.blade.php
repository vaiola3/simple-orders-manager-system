@extends('layouts.index', \compact('args'))

@section('thead')
<thead class="thead-dark">
    <tr align="center">
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Contato</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
@endsection

@section('tbody')
<tbody>
    @foreach ($args['clients'] as $item)
    <tr align="center">
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->contact }}</td>
        <td>
            <a 
                href="{{ route('clients.addresses.show', [$item->id]) }}" 
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
@endsection