@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Modifica il progetto: {{ $project->title }}</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg">Torna alla lista progetti</a>
        </div>

        @include('shared.errors')

        <section class="py-5">
            <!--metodo update vuole anche $project-->
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $project->title) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="6" name="description">{{ old('description', $project->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Modifica un progetto</button>
            </form>
        </section>
    </div>
@endsection
