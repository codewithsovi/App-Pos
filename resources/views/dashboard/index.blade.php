@extends('layouts.app')


@section('header_content')
    <div class="card-body">
        Welcome to POS APP <strong>{{ auth()->user()->name }}</strong>
    </div>
@endsection

@section('content')
    
@endsection
