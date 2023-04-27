@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Ajout')

@section('content')
    <h1>Ajouter un mot rare</h1>

    <form action="" method="post">
        @csrf
        
        <div class="mb-3">
            <label for="word" class="form-label">Mot:</label>
            <input type="text" class="form-control" name="word" id="word" />
        </div>

        <div class="mb-3">
            <label for="definition" class="form-label">Définition:</label>
            <input type="text" class="form-control" name="definition" id="definition" />
        </div>

        <div class="mb-3">
            <label for="exemple" class="form-label">Example (optionnel) :</label>
            <input type="text" class="form-control" name="exemple" id="exemple" />
        </div>

        <div class="mb-3">
            <label for="pronunciation" class="form-label">Prononciation (optionnel) :</label>
            <input type="text" class="form-control" name="pronunciation" id="pronunciation" />
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <select name="type" id="type">
                @foreach ($data['types'] as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug" id="slug" />
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
@endsection