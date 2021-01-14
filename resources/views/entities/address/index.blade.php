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

    @foreach ($args['pload']['output'] as $key => $value)
    <tr align="center">
        <td>{{ $value->id }}</td>
        <td>{{ $value->description }}</td>
        <td>{{ $value->cep }}</td>
        <td>
            <a 
                href="{{ route('client.addresses.edit', [$args['pload']['client'], $value->id]) }}" 
                class="btn btn-sm own-yellow shadow-sm">
                Editar
            </a>
            <a 
                href="{{ route('client.addresses.delete', [$args['pload']['client'], $value->id]) }}" 
                class="btn btn-sm own-red shadow-sm">
                Excluir
            </a>
        </td>
    </tr>
    @endforeach

</tbody>
@endsection