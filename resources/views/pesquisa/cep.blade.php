@extends('templates.template')

@push('styles')
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endpush


@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h4>Pesquisa Vue.js</h4>
        <div class="row bg-light">
            <div class="col-2">
                <input type="text" name="code" id="code" class="form-control" placeholder="CEP" aria-label="CEP">
            </div>
            <div class="col-8">
                <input type="text" name="address" id="address" class="form-control" placeholder="Logradouro" aria-label="Logradouro">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>

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

            </tbody>
        </table>
    </div>
</div>

@endsection