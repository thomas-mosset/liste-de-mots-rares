@extends('base') <!-- fichier base.blade.php -->

@section('title', 'Accueil')

@section('content')
    <h1>Liste de mots rares</h1>

    @foreach ($words as $word)
        <div>
            <div>
                <h2>{{ $word->word }}</h2>

                @if ($word->pronunciation !== null)
                    <span>({{ $word->pronunciation }})</span>
                @endif
            </div>
            
            <span>{{ $word->type }}</span>

            <p>{{ $word->definition }}</p>

            @if ($word->exemple !== null)
                <p>Ex: {{ $word->exemple }}</p>
            @endif

            <a href="{{ route('liste.showOne', ['slug' => $word->slug, 'id' => $word->id]) }}" class="btn btn-success">Accéder au mot</a>

        </div>
    @endforeach

    <!-- for pagination-->
    {{ $words->links() }}
@endsection