@extends('base') <!-- fichier base.blade.php -->

@section('title', $word->word)

@section('content')
    <div>
        <div>
            <h1>{{ $word->word }}</h1>

            @if ($word->pronunciation !== null)
                <span>(Se prononce : '{{ $word->pronunciation }}')</span>
            @endif
        </div>
        
        <span>{{ $word->type }}</span>

        <p>{{ $word->definition }}</p>

        @if ($word->exemple !== null)
            <p>Ex: {{ $word->exemple }}</p>
        @endif

        <button type="button" class="btn btn-success">
            <a href="{{ route('liste.edit', $word->id) }}" class="link-light link-offset-2 link-underline link-underline-opacity-0">Modifier le mot</a>
        </button>
    </div>
@endsection