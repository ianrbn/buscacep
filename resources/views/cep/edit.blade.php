@extends('templates.template')

@section('content')
<div class="col d-flex justify-content-center m-3">
    <div class="card col-4">
        <div class="card-header">
            <h5>Editar CEP</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('ceps.update', $cep->slug) }}" method="POST">
                @csrf
                @method('put')

                <label for="code">CEP</label>
                <input type="text" name="code" id="code" maxlength="9" class="form-control @error('code') is-invalid @enderror" value="{{ $cep->code }}">
                @error('code')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="state">Estado</label>
                <input type="text" name="state" id="state" maxlength="2" class="form-control @error('state') is-invalid @enderror" value="{{ $cep->state }}">
                @error('state')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="city">Cidade</label>
                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ $cep->city }}">
                @error('city')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="district">Distrito</label>
                <input type="text" name="district" id="district" class="form-control @error('district') is-invalid @enderror" value="{{ $cep->district }}">
                @error('district')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="address">Endereço</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $cep->address }}">
                @error('address')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror



                </br>
                <input type="submit" value="Salvar" class="btn btn-success">
            </form>

            <br>

            <h5>Deseja excluir o CEP '{{ $cep->code }}'?</h5>
            <form action="{{ route('ceps.destroy', $cep->slug) }}" method="POST">
                @csrf
                @method('delete')

                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>

        </div>
        @if (session('message') != '')
        <div class="card-footer text-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-3">
    <div class="col justify-content-center d-flex">
        <a href="{{ route('ceps.show', $cep) }} " type="button" class="btn btn-primary me-3">Voltar</a>
    </div>
</div>
@stop