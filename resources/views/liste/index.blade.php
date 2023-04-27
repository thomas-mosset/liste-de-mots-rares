@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Accueil')

@section('content')
    <h1>Liste de mots rares</h1>

    @foreach ($words as $word)
        <article>
            <h2>{{ $word->word }}</h2>

            @if ($word->pronunciation !== null)
                <span>({{ $word->pronunciation }})</span>
            @endif

            <span>{{ $word->type }}</span>

            <p>{{ $word->definition }}</p>

            @if ($word->exemple !== null)
                <span>Ex: {{ $word->exemple }}</span>
            @endif

        </article>
    @endforeach

    {{ $words->links() }}
@endsection