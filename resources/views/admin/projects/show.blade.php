@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3">Vista Progetto: {{ $project->title }}</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg">Torna alla lista progetti</a>
        </div>

        <section class="py-3">
            @if (session('status'))
                <div class="allert alleert-success">
                    {{ session('status') }}
                </div>
            @endif
        </section>

        <section class="py-5">
            <div class="card">
                <div class="card-body text-center">
                    <h2>{{ $project->title }}</h2>
                    <div>DESCRIZIONE: {{ $project->description }}</div>
                    <div>SLUG: {{ $project->slug }}</div>
                    <div><strong>ID: {{ $project->id }}</strong></div>
                </div>
            </div>
        </section>
    </div>
@endsection
