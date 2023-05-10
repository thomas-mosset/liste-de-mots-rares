@extends('base')

@section('title', '404')

@section('content')
    <div class="mx-auto my-5 p-3 d-flex flex-column">
        <div class="d-flex flex-column text-center mb-4">
            <h1 class="text-center text-error">Erreur</h1>
            <p>La page recherchée n'a pas été trouvée.</p>

            <p><a href="{{ route('liste.index') }}" class="link-underline-success text-success">Retourner à la liste des mots !</a></p>
    </div>
@endsection