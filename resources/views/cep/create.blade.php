@extends('templates.template')

@section('content')
<div class="col d-flex justify-content-center">
    <div class="card col-4 m-3">
        <div class="card-header">
            <h5>Novo CEP</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('ceps.store') }}" method="post">
                @csrf

                <label for="code">Código</label>
                <input type="text" name="code" id="code" maxlength="9" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}">
                @error('code')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="state">Estado</label>
                <input type="text" name="state" id="state" maxlength="2" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}">
                @error('state')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="city">Cidade</label>
                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                @error('city')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="district">Distrito</label>
                <input type="text" name="district" id="district" class="form-control @error('district') is-invalid @enderror" value="{{ old('district') }}">
                @error('district')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                <label for="address">Endereço</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                @error('address')
                <i class="text-danger">{{ $message }}</i><br>
                @enderror

                </br>
                <input type="submit" value="Salvar" class="btn btn-success"></br>
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
        <a href="{{ route('ceps.list') }} " type="button" class="btn btn-primary me-3">Voltar</a>
    </div>
</div>
@stop