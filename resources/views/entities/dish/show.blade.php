@extends('layouts.index', \compact('args'))

@section('thead')
<thead class="thead-dark">
    <tr align="center">
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Tipo de Prato</th>
    </tr>
</thead>
@endsection

@section('tbody')
<tbody>
    @foreach ($args['dishes'] as $item)
    <tr align="center">
        <td>{{ $item->id }}</td>
        <td>{{ $item->id }}</td>
        <td>a</td>
        <td>test</td>
    </tr>
    @endforeach
</tbody>
@endsection