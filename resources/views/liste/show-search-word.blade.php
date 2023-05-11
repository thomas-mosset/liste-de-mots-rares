@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Résultat de recherche')

@section('content')
    <div class="mx-auto my-5 p-3 d-flex flex-column">
        <div class="d-flex flex-column text-center mb-4">
            <h1 class="text-center text-success">Résultat pour la recherche "{{ $search }}"</h1>

            @if (count($resultWords) > 0)
                @foreach ($resultWords as $resultWord)
                    <div class="mt-5">
                        <h2>{{ $resultWord->word }}</h2>
                        <div class="btn-action-div">
                            <a href="{{ route('liste.showOne', ['slug' => $resultWord->slug, 'id' => $resultWord->id]) }}" class="btn btn-success">Accéder au mot</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">{{ $message }}</p>
            @endif
        </div>
    </div>
@endsection