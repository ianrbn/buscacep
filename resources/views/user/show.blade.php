@extends('templates.template')

@push('styles')
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endpush


@section('content')

<h3>Dados do usuário</h3>

<table class="table bg-light">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Criação</th>
            <th scope="col">Atualização</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </tbody>
</table>

@endsection