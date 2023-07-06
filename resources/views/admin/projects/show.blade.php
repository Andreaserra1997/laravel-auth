@extends('admin.layouts.base')

@section('contents')

    <h1>Nome del progetto: {{ $project->name }}</h1>
    <h2>Cliente: {{ $project->client_name }}</h2>
    <h2>Data: {{ $project->date }}</h2>
    <img src="{{ $project->cover_image }}" alt="{{ $project->name }}">
    <p>{{ $project->summary }}</p>

@endsection