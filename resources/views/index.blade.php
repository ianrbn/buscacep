@extends('templates.template')

@push('styles')
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endpush


@section('content')

<div class="row justify-content-center">
    <div class="col-auto text-center">
        <h1 class="mt-4">Avaliação Técnica</h1>
        <h3 class="m-4">Ian Robinson</h3>
        <h5 class="text-muted">RevendaMais</h5>
    </div>
</div>

@endsection