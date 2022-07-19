@extends('templates.template')

@push('styles')
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endpush


@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h3>Lista de CEPs</h3>

        @if (session('message') != '')
        <div class="card-footer text-success">
            {{ session('message') }}
        </div>
        @endif

        <table class="table table-light table-hover table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Endereço</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cepList as $cep)
                <tr>
                    <td><a href="{{ route('ceps.show', $cep->slug) }}" class="list-group-item ">{{ substr_replace($cep->code, '-', 5, 0) }}</a></td>
                    <td><a href="{{ route('ceps.show', $cep->slug) }}" class="list-group-item ">{{ $cep->state }}</a></td>
                    <td><a href="{{ route('ceps.show', $cep->slug) }}" class="list-group-item ">{{ $cep->city }}</a></td>
                    <td><a href="{{ route('ceps.show', $cep->slug) }}" class="list-group-item ">{{ $cep->district }}</a></td>
                    <td><a href="{{ route('ceps.show', $cep->slug) }}" class="list-group-item ">{{ $cep->address }}</a></td>
                </tr>
                @endforeach
                @if ($cepList->count() == 0)
                <tr>
                    <td colspan="5">Não existem CEPs cadastrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection