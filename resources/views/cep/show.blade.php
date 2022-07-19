@extends('templates.template')

@section('content')
<div class="row mt-3">
    <div class="col justify-content-center d-flex">

        <div class="card col-4">
            <div class="card-header">
                <h5>Informações do CEP</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><b>Código</b></td>
                        <td><b>{{ substr_replace($cep->code, '-', 5, 0) }}</b></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{ $cep->state }}</td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td>{{ $cep->city }}</td>
                    </tr>
                    <tr>
                        <td>Distrito</td>
                        <td>{{ $cep->district }}</td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td>{{ $cep->address }}</td>
                    </tr>

                </table>
            </div>
            <div class="card-footer text-muted">
                Criado em: {{ $cep->created_at }}<br>
                Atualizado em: {{ $cep->updated_at }}<br>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col justify-content-center d-flex">
        <a href="{{ route('ceps.list') }} " type="button" class="btn btn-primary me-3">Voltar</a>
        <a href="{{ route('ceps.edit', $cep->slug) }} " type="button" class="btn btn-secondary">Editar</a>
    </div>
</div>
@stop