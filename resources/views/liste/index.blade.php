@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Accueil')

@section('content')

<div class="mx-auto my-5 p-3 d-flex flex-column">
    <h1 class="text-center text-success mb-5">Liste de mots rares</h1>

    <div>
        <p>Tri par :</p>
        <div>
            <a href="{{ route('liste.index', ['sortedby' => 'most-recent']) }}" class="btn btn-success mb-2">Date (plus récent)</a>
            <a href="{{ route('liste.index', ['sortedby' => 'ASC']) }}" class="btn btn-success mb-2">Ordre alphabétique</a>
            <a href="{{ route('liste.index', ['sortedby' => 'DESC']) }}" class="btn btn-success mb-2">Ordre alphabétique inversé</a>
        </div>
    </div>

    @foreach ($words as $word)
        <div class="my-4 p-3 d-flex justify-content-between align-items-center list-single-word">
            <div class="d-flex flex-column list-single-word-top-infos">
                <h2 class="text-success">{{ $word->word }}</h2>
                <span class="fw-bold">[{{ $word->type }}]</span>
            </div>

            <p>{{ $word->definition }}</p>

            <div class="btn-action-div">
                <a href="{{ route('liste.showOne', ['slug' => $word->slug, 'id' => $word->id]) }}" class="btn btn-success">Accéder au mot</a>
            </div>
        </div>
    @endforeach
</div>

<!-- for pagination-->
<div class="pagination-container d-flex justify-content-center">
    {{ $words->withQueryString()->links() }}
</div>
@endsection