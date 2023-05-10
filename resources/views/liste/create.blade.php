@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Ajout')

@section('content')

    <div class="mx-auto my-5 p-3 d-flex flex-column">
        <h1 class="text-center text-success mb-5">Ajouter un mot rare</h1>

        <form action="" method="post" class="text-center fw-bold form">
            @csrf
            
            <div class="mb-3 form-sub-container">
                <label for="word" class="form-label">Mot:</label>
                <input type="text" class="form-control" name="word" id="word" value="{{ old('word') }}"/> 
                <!-- value="{{ old('word') }} permet de récupérer l'ancienne valeur entrée -->

                @error("word")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="definition" class="form-label">Définition:</label>
                <input type="text" class="form-control" name="definition" id="definition" value="{{ old('definition') }}"/>

                @error("definition")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exemple" class="form-label">Example (optionnel) :</label>
                <input type="text" class="form-control" name="exemple" id="exemple" value="{{ old('exemple') }}"/>
            </div>

            <div class="mb-3">
                <label for="pronunciation" class="form-label">Prononciation (optionnel) :</label>
                <input type="text" class="form-control" name="pronunciation" id="pronunciation" value="{{ old('pronunciation') }}" />
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select class="form-select" name="type" id="type">
                    @foreach ($data['types'] as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>

                @error("type")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug:</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" />

                @error("slug")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="btn-action-div">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
@endsection