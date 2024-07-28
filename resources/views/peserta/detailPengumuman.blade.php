@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $data->judul }} <small>Public at : {{ $data->created_at }}</small></h4>
        </div>
        <div class="card-body">
            {!! $data->isi !!}
        </div>
    </div>
@endsection