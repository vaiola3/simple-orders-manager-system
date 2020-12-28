@extends('layouts.index', \compact('args'))

@section('thead')
<thead class="thead-dark">
    <tr align="center">
        <th scope="col">ID</th>
        <th scope="col">Descrição</th>
        <th scope="col">Cep</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
@endsection

@section('tbody')
<tbody>
    @foreach ($args['addresses'] as $item)
    <tr align="center">
        <td>{{ $item->id }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->cep }}</td>
        <td>
            <a 
                href="{{ route('client.addresses.edit', [$item->id]) }}" 
                class="btn btn-sm own-yellow shadow-sm">
                Editar
            </a>
            <a 
                href="{{ route('client.addresses.delete', [$item->id]) }}" 
                class="btn btn-sm own-red shadow-sm">
                Inativar
            </a>
        </td>
    </tr>
    @endforeach
</tbody>
@endsection