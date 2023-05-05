@extends('base') <!-- fichier base.blade.php -->

@section('title', $word->word)

@section('content')
    <div class="mx-auto my-5 p-3 d-flex flex-column">
        <div class="d-flex flex-column text-center mb-4">
            <h1 class="text-center text-success">{{ $word->word }}</h1>

            @if ($word->pronunciation !== null)
                <span class="text-center">(Se prononce : '{{ $word->pronunciation }}')</span>
            @endif

            <span class="text-center fw-bold">[{{ $word->type }}]</span>
        </div>

        <p class="text-center">{{ $word->definition }}</p>

        @if ($word->exemple !== null)
            <p class="text-center">Ex: {{ $word->exemple }}</p>
        @endif

        <div class="btn-action-div">
            <button type="button" class="btn btn-success">
                <a href="{{ route('liste.edit', $word->id) }}" class="link-light link-offset-2 link-underline link-underline-opacity-0">Modifier le mot</a>
            </button>
        </div>
    </div>
@endsection