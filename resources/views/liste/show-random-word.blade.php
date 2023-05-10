@extends('base') <!-- fichier base.blade.php -->

@section('title', $randomWord->word)

@section('content')
    <div class="mx-auto my-5 p-3 d-flex flex-column">
        <div class="d-flex flex-column text-center mb-4">
            <h1 class="text-center text-success">{{ $randomWord->word }}</h1>

            @if ($randomWord->pronunciation !== null)
                <span class="text-center">(Se prononce : '{{ $randomWord->pronunciation }}')</span>
            @endif

            <span class="text-center fw-bold">[{{ $randomWord->type }}]</span>
        </div>

        <p class="text-center">{{ $randomWord->definition }}</p>

        @if ($randomWord->exemple !== null)
            <p class="text-center">Ex: {{ $randomWord->exemple }}</p>
        @endif
    </div>
@endsection